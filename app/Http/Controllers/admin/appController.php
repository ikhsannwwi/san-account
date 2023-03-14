<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\app;
use Illuminate\Http\Request;

class appController extends Controller
{
    public function add_app(){
        if (!auth()->user()) {
            return redirect()->route('admin_index')->with('error', ' Anda Tidak Ada Session');
        }
        $data = app::all();

        return view('admin.add.add-app' , compact(
            'data'
        ));
    }

    public function insert_app(Request $request){
        $request->validate([
            'app' => 'required',
            'foto' => 'required',
        ]);
        $data = app::create($request->all());

        $data->save();
        return redirect()->route('admin_app')->with('success', 'Data Berhasil Ditambakan');
    }

    public function edit_app($id){
        if (!auth()->user()) {
            return redirect()->route('admin_index')->with('error', ' Anda Tidak Ada Session');
        }
        $data = app::find($id);
        if (auth()->user()->role_user->role == 'Pengguna') {
            if (auth()->user()->id != $data->user_id) {
                return redirect()->route('admin_app')->with('error', ' Anda Bukan '.$data->user->name);
            }
        }

        return view('admin.edit.edit-app',compact(
            'data'
        ));
    }

    public function update_app(Request $request,$id){
        $request->validate([
            'app' => 'required',
            'foto' => 'required',
        ]);

        $data = app::find($id);

        $data->update($request->all());

        $data->save();

        return redirect()->route('admin_app')->with('success','Data Berhasil Diupdate');
    }

    public function delete_app($id){
        $data = app::find($id);
        if(auth()->user()->role_user->role == 'Moderator'){
            $data->delete();
        } else if(auth()->user()->role_user->role == 'Pengguna'){
            if (auth()->user()->id != $data->user_id) {
                # code...
                return redirect()->route('admin_app')->with('error','Anda Bukan ' .$data->user->name);
            }
        }
        $data->delete();

        return redirect()->route('admin_app')->with('error','Data Berhasil Dihapus oleh '.auth()->user()->name);
    }
}
