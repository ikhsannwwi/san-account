<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Models\role_user;
use Illuminate\Http\Request;

class role_userController extends Controller
{
    public function add_role_user(){
        if (auth()->user()->role_user->role != 'Moderator') {
            return redirect()->route('admin_index')->with('error', ' Anda Bukan Moderator');
        }
        $data = role_user::all();

        return view('admin.add.add-role-user' , compact(
            'data'
        ));
    }

    public function insert_role_user(Request $request){
        $request->validate([
            'role' => 'required',
        ]);
        $data = role_user::create($request->all());

        $data->save();
        return redirect()->route('admin_role_user')->with('success', 'Data Berhasil Ditambakan');
    }

    public function edit_role_user($id){
        if (auth()->user()->role_user->role != 'Moderator') {
            return redirect()->route('admin_index')->with('error', ' Anda Bukan Moderator');
        }
        $data = role_user::find($id);

        return view('admin.edit.edit-role-user',compact(
            'data'
        ));
    }

    public function update_role_user(Request $request,$id){
        $request->validate([
            'role' => 'required',
        ]);

        $data = role_user::find($id);

        $data->update($request->all());

        $data->save();

        return redirect()->route('admin_role_user')->with('success','Data Berhasil Diupdate');
    }

    public function delete_role_user($id){
        if (auth()->user()->role_user->role != 'Moderator') {
            return redirect()->route('admin_index')->with('error', ' Anda Bukan Moderator');
        }
        $data = role_user::find($id);

        $data->delete();

        return redirect()->route('admin_role_user')->with('error','Data Berhasil Dihapus');
    }
}
