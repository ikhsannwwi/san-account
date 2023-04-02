<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Models\role_user;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class userController extends Controller
{
    public function admin_user()
    {
        if (auth()->user()->role_user->role == 'Moderator') {
            # code...
            $data = User::all();
            return view('admin.data.user',compact('data'));
        }
        return redirect()->route('admin_index')->with('error','Anda Bukan Moderator');
    }


    public function login()
    {
        return view('admin.authentication.login');
    }

    public function login_proses(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('/app')->with('success','Berhasil Validasi Login');
        }
        
        return back()->withErrors([
            // 'email' => 'The provided credentials do not match our records.',
            'password' => 'Password tidak sesuai!!!',
        ])->onlyInput('email','password');
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }

    public function add_user()
    {
        if (auth()->user()->role_user->role == 'Moderator') {
            $data = User::all();
            $data_role = role_user::all();

            return view('admin.add.add-user',compact('data',
                'data_role',
            ));
        }
        return redirect()->route('admin_index')->with('error','Anda Bukan Moderator');
    }
    public function insert_user(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'foto' => 'required',
            'role_id' => 'required',
            'password' => 'required',
        ]);
        $data = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'foto' => $request->foto,
            'role_id' => $request->role_id,
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(60) ,
        ]);

        if($request->hasfile('foto')){
            $nama_baru = Str::random(5) . '.' . $request->file('foto')->extension();
            $request->file('foto')->move('images/user/', $nama_baru);
            $data->foto = $nama_baru;
            $data->save();
        }

        return redirect()->route('admin_user')->with('success', 'Data Berhasil Ditambahkan');
    }
    public function insert_user_all(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            // 'foto' => 'required',
            'role_id' => 'required',
            'password' => 'required',
        ]);
        $data = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'foto' => $request->foto,
            'role_id' => $request->role_id,
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(60) ,
        ]);

        if (!$data) {
            # code...
            return redirect()->route('regist')->with('success', 'Data Berhasil Ditambahkan');
        }
        if ($request->hasfile('foto')) {
            # code...
            $data->foto = 'default';
        }

        if($request->hasfile('foto')){
            $nama_baru = Str::random(5) . '.' . $request->file('foto')->extension();
            $request->file('foto')->move('images/user/', $nama_baru);
            $data->foto = $nama_baru;
            $data->save();
        }
        $data->save();

        return redirect()->route('login')->with('success', 'Data Berhasil Ditambahkan');
    }
    public function edit_user($id)
    {
        if (auth()->user()->role_user->role == 'Moderator') {
            $data = User::find($id);
            $data_role = role_user::all();


            return view('admin.edit.edit-user' ,compact('data',
                'data_role',
            ));
        }
        return redirect()->route('admin_index')->with('error','Anda Bukan Moderator');
    }
    public function edit_user_password($id)
    {
        if (auth()->user()->role_user->role == 'Moderator') {
            $data = User::find($id);

            return view('admin.edit.edit-user-password' ,compact('data'));
        }
        return redirect()->route('admin_index')->with('error','Anda Bukan Moderator');
    }
    public function update_user_password(Request $request,$id)
    {
        $data = User::find($id);

        $data->update([
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(60)
        ]);

        return redirect()->route('admin_user')->with('success', 'Password Berhasil Diupdate');
    }

    public function update_user(Request $request, $id){
        $data = User::find($id);

        if($request->hasfile('foto')){
            if(File_exists(public_path('images/user/'.$data->foto))){ //either you can use file path instead of $data->image
                unlink(public_path('images/user/'.$data->foto));//here you can also use path like as ('uploads/media/welcome/'. $data->image)
            }
        }
        $data->update($request->all());
        $data->remember_token = Str::random(60);
        if($request->hasfile('foto')){
             $nama_baru = Str::random(8) . '.' . $request->file('foto')->extension();
             $request->file('foto')->move('images/user/', $nama_baru);
             $data->foto = $nama_baru;
             $data->save();
        }
        return redirect()->route('admin_user')->with('success', 'Data Berhasil Diupdate');
    }

    public function delete_user($id){
        $data = User::find($id);

        if (auth()->user()->role_user->role != 'Moderator') {
            return redirect()->route('admin_index')->with('error', ' Data Gagal Di Delete');
        }
        if(File_exists(public_path('images/user/'.$data->foto))){ //either you can use file path instead of $data->image
            unlink(public_path('images/user/'.$data->foto));//here you can also use path like as ('uploads/media/welcome/'. $data->image)
        }
        
        
        $data->delete();
        return redirect()->route('admin_user')->with('error', 'Data Berhasil Dihapus');
    }
}
