<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\app;
use Illuminate\Http\Request;

class f_appController extends Controller
{
    public function insert_app(Request $request){
        $request->validate([
            'app' => 'required',
            'foto' => 'required',
        ]);
        $data = app::create($request->all());

        $data->save();
        return redirect()->route('admin_index')->with('success', 'Data Berhasil Ditambakan');
    }

    public function edit_app($slug){
        if (!auth()->user()) {
            return redirect()->route('admin_index')->with('error', ' Anda Tidak Ada Session');
        }
        $data = app::where('slug',$slug)->first();
        if (auth()->user()->role_user->role == 'Pengguna') {
            if (auth()->user()->id != $data->user_id) {
                return redirect()->route('admin_app')->with('error', ' Anda Bukan '.$data->user->name);
            }
        }
        return view('frontend.edit-app',compact(
            'data'
        ));
    }

    public function update_app(Request $request,$slug){
        $request->validate([
            'app' => 'required',
            'foto' => 'required',
        ]);

        $data = app::where('slug',$slug)->first();

        $data->update($request->all());

        $data->save();

        return redirect()->route('admin_index')->with('success','Data Berhasil Diupdate');
    }

    public function delete_app($slug){
        $data = app::where('slug',$slug)->first();
        if(auth()->user()->role_user->role == 'Moderator'){
            $data->delete();
        } else if(auth()->user()->role_user->role == 'Pengguna'){
            if (auth()->user()->id != $data->user_id) {
                # code...
                return redirect()->route('admin_index')->with('error','Anda Bukan ' .$data->user->name);
            }
        }
        $data->delete();

        return redirect()->route('admin_index')->with('error','Data Berhasil Dihapus oleh '.auth()->user()->name);
    }
}
