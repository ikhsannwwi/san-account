<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\account;
use App\Models\app;
use App\Models\role_user;
use Illuminate\Http\Request;

class viewController extends Controller
{
    public function admin_index(Request $request){
        // dd($data);
        if (!auth()->user()) {
            # code...
            return redirect()->route('login')->with('unlogin');
        }

        if ($request->has('q')) {
            # code...
            if (auth()->user()->role_user->role == 'Moderator') {
                $data = app::orderBy('updated_at','DESC')->where('app','like', '%' . $request->q . '%')->with('account')->get();
                # code...
            }else if (auth()->user()->role_user->role == 'Pengguna') {
                # code...
                $data = app::orderBy('updated_at','DESC')->where('user_id' , '=' , auth()->user()->id)
                                ->where('app', 'like', '%' . $request->q . '%')->with('account')->get();
            }
        }else {
            if (auth()->user()->role_user->role == 'Moderator') {
                $data = app::orderBy('updated_at','DESC')->with('account')->get();
                    # code...
                }else if (auth()->user()->role_user->role == 'Pengguna') {
                # code...
                $data = app::where('user_id' , '=' , auth()->user()->id)
                ->orderBy('updated_at','DESC')->with('account')->get();
            }
        }
        return view('admin.main', compact(
            'data',
        ));
    }

    public function app_detail($slug){
        $data = app::where('slug',$slug)->with('account')->first();
// dd($data);
        return view('frontend.app-detail', compact(
            'data',
        ));
    }

    public function admin_account(){
        if (auth()->user()) {
            if (auth()->user()->role_user->role == 'Moderator') {
                # code...
                $data = account::orderBy('updated_at','DESC')->get();
            }else if (auth()->user()->role_user->role == 'Pengguna') {
                # code...
                $data = account::where('user_id' , '=' , auth()->user()->id)
                                    ->orderBy('updated_at','DESC')->get();
            }

            return view('admin.data.account', compact(
                'data'
            ));
        }
        return redirect()->route('admin_index')->with('error','Tidak Ada Session');
    }
    public function admin_app(){
        if (auth()->user()) {
            if (auth()->user()->role_user->role == 'Moderator') {
                # code...
                $data = app::orderBy('updated_at','DESC')->get();
            }else if (auth()->user()->role_user->role == 'Pengguna') {
                # code...
                $data = app::where('user_id' , '=' , auth()->user()->id)
                    ->orderBy('updated_at','DESC')->get();
            }

            return view('admin.data.app', compact(
                'data'
            ));
        }
        return redirect()->route('admin_index')->with('error','Anda Bukan Moderator');
    }
    public function admin_role_user(){
        if (auth()->user()->role_user->role == 'Moderator') {

            $data = role_user::all();

            return view('admin.data.role-user', compact(
                'data'
            ));
        }
        return redirect()->route('admin_account')->with('error','Anda Bukan Moderator');
    }
}
