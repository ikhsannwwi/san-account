<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\account;
use App\Models\app;
use App\Models\User;
use Illuminate\Http\Request;

class accountController extends Controller
{
    public function add_account(){
        if (!auth()->user()) {
            return redirect()->route('admin_index')->with('error', ' Anda Tidak Ada Session');
        }
        $data = account::all();
        if(auth()->user()->role_user->role == 'Moderator'){
            $data_app = app::all();
            $data_user = User::all();
        } else if(auth()->user()->role_user->role == 'Pengguna'){
            $data_app = app::where('user_id','=' ,auth()->user()->id)->get();
            $data_user = User::where('id','=' ,auth()->user()->id)->get();
        }

        return view('admin.add.add-account' , compact(
            'data',
            'data_app',
            'data_user',
        ));
    }

    public function insert_account(Request $request){
        $request->validate([
            'app_id' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'user_id' => 'required',
        ]);
        $data = account::create($request->all());

        $data->save();
        return redirect()->route('admin_account')->with('success', 'Data Berhasil Ditambakan');
    }

    public function edit_account($id){
        if (!auth()->user()) {
            return redirect()->route('admin_index')->with('error', ' Anda Tidak Ada Session');
        }
        $data = account::find($id);
        
        if(auth()->user()->role_user->role == 'Moderator'){
            $data_app = app::all();
            $data_user = User::all();

        }else if(auth()->user()->role_user->role == 'Pengguna'){
            if(auth()->user()->id != $data->user_id){
            return redirect()->route('admin_account')->with('error', ' Anda Bukan '.$data->user->name);
            }
            $data_app = app::where('user_id','=',$data->user_id);
        }
        
        return view('admin.edit.edit-account',compact(
            'data',
            'data_app',
            'data_user',
        ));
    }

    public function update_account(Request $request,$id){
        $request->validate([
            'app_id' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'user_id' => 'required',
        ]);

        $data = account::find($id);
        

        $data->update($request->all());

        $data->save();

        return redirect()->route('admin_account')->with('success','Data Berhasil Diupdate');
    }

    public function delete_account($id){
        $data = account::find($id);
        if(auth()->user()->role_user->role == 'Moderator'){
            $data->delete();
        } else if (auth()->user()->id != $data->user_id) {
            # code...
            return redirect()->route('admin_app')->with('error','Anda Bukan ' .$data->user->name);
        }

        $data->delete();

        return redirect()->route('admin_account')->with('error','Data Berhasil Dihapus');
    }
}
