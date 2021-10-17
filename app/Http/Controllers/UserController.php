<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{

    public function home()
    {

        return view("home");
    }

    public function liste()
    {
        $users = User::all();

        return view("users", ["users" => $users]);
    }



    public function delete(Request $request,$id){
        $user=User::find($id);
        if($request->isMethod("get")){
            $user->delete();
            return redirect('/users');
        }
        return view("delete",compact("user","id"));
    }

    public function auteur(Request $request,$id){
        $user=User::find($id);
        $user->role = 'aut';
        $user->save();
        return redirect('/users');
    }

    public function moder(Request $request,$id){
        $user=User::find($id);
        $user->role = 'moder';
        $user->save();
        return redirect('/users');
    }

    public function admin(Request $request,$id){
        $user=User::find($id);
        $user->role = 'admin';
        $user->save();
        return redirect('/users');
    }

}
