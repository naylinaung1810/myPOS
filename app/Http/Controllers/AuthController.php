<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class AuthController extends Controller
{
    public function getLogin()
    {
        return view('Auth.signin');
    }
    public function postLogin(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'password'=>'required'
        ]);

        $name=$request['name'];
        $password=$request['password'];

        if (Auth::attempt(['name' => $name, 'password' => $password])) {
            if(Auth::User()->getRoleNames()[0]=='super-admin' || Auth::User()->getRoleNames()[0]=='admin')
                return redirect()->route('/');
            else
                return redirect()->route('dashboard.home');
        } else {
            return redirect()->back()->with('error', 'Validation is invalid');
        }
    }

    public function getAddUser()
    {
        $role=Role::all();
        return view('Auth.newUser')->with(['role'=>$role]);
    }
    public function postAddUser(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|unique:users',
            'email'=>'required|unique:users',
            'password'=>'required',
            'confirm'=>'required'
        ]);
        $name=$request['name'];
        $email=$request['email'];
        $password=bcrypt($request['password']);
        if($request['password']==$request['confirm'])
        {
            $user=new User();
            $user->name=$name;
            $user->email=$email;
            $user->password=$password;
            $user->syncRoles($request['role']);
            $user->shop_id=1;
            $user->save();
            return redirect()->back()->with('info','New User addition is successful');
        }else
        {
            return redirect()->back()->with('error','Authentication failed');
        }

    }

    public function getUser()
    {
        $user=User::get();
        return view('Auth.users')->with(['users'=>$user]);
    }

    public function getLogout()
    {
        Auth::logout();

        return redirect()->back();
    }
}
