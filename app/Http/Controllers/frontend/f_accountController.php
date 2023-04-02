<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\account;
use App\Models\app;
use App\Models\User;
use Illuminate\Http\Request;

class f_accountController extends Controller
{
    public function f_insert_account(Request $request,$slug){
        $dataa = app::where('slug',$slug)->firstOrFail();
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $data = account::create($request->all());

        $data->save();
        return redirect()->route('app_detail',$dataa->slug)->with('success', 'Data Berhasil Ditambakan');
    }

    public function f_edit_account($slug,$id){
        
        if (!auth()->user()) {
            return redirect()->route('login')->with('error', ' Anda Tidak Ada Session');
        }
        $data = account::find($id);
        $dataa = app::where('slug',$slug)->first();
        if(auth()->user()->role_user->role == 'Moderator'){
            $data_app = app::all();
            $data_user = User::all();
        }else if(auth()->user()->role_user->role == 'Pengguna'){
            $data_app = app::where('user_id','=',$data->user_id)->get();
            $data_user = User::all();
        }
        if (auth()->user()->role_user->role == 'Pengguna') {
            if (auth()->user()->id != $data->user_id) {
                return redirect()->route('app_detail',$dataa->slug)->with('error', ' Anda Bukan '.$data->user->name);
            }
        }
        return view('frontend.edit-account',compact(
            'data',
            'dataa',
            'data_app',
            'data_user',
        ));
    }

    public function f_update_account(Request $request,$slug,$id){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $dataa = app::where('slug',$slug)->first();


        $data = account::find($id);

        $data->update($request->all());

        $data->save();

        return redirect()->route('admin_index',$dataa->slug)->with('success','Data Berhasil Diupdate');
    }

    public function f_delete_account($id){
        $data = account::find($id);
        if(auth()->user()->role_user->role == 'Moderator'){
            $data->delete();
        } else if(auth()->user()->role_user->role == 'Pengguna'){
            if (auth()->user()->id != $data->user_id) {
                # code...
                return redirect()->route('app_detail')->with('error','Anda Bukan ' .$data->user->name);
            }
        }
        $data->delete();

        return redirect()->route('app_detail',$data->app->slug)->with('error','Data Berhasil Dihapus oleh '.auth()->user()->name);
    }
}
