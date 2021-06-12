<?php

namespace App\Http\Controllers;
// namespace App\Http\Controllers; revert back

use Illuminate\Http\Request;
use Response;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index() {
        return view('login');
    } 

    public function register() {
        return view('register');
    }
    public function userDetails(Request $request){
        $user = User::where('email',request('email'))->first();
        if($user){
            return response(['user' => $user,'msg'=>'user found','done'=>true,'success'=>true]);
        }else{
            return response(['user' => [],'msg'=>'User not found','done'=>true,'success'=>false]);
        }
    }

    public function updateDetails(Request $request){
        $user = User::where('id',request('id'))->update([
            'email'=>request('email'),
            'name'=>request('name'),
            'username'=>request('username'),
        ]);
        if($user == 1){
            return response(['success'=>true,'msg'=>'Profile Information Updated', 'done'=>true]);
        }else{
            return response(['success'=>false, 'msg'=>'An Error Occurred','done'=>true]);
        }
    }

    public function updatePassword(Request $request){
        
        $finduser = User::where('id',request('id'))->first();

        if(Hash::check(request('oldpassword'),$finduser->password )){ // check if old entered password is same as database password
            $user = User::where('id',request('id'))->update([
                'password'=>bcrypt(request('newpassword'))
            ]);
            if($user == 1){
                return response(['success'=>true,'msg'=>'Password Successfully Changed', 'done'=>true]);
            }else{
                return response(['success'=>false, 'msg'=>'An Error Occurred, try again','done'=>true]);
            }
        }else{
            return response(['msg'=>'Old password is incorrect','success'=>false,'done'=>true]);
        };
        
    }

    public function deleteUser(Request $request){
        $q = request()->query('q_email');
        $user = User::where('email',$q)->delete();
        if($user == 1){
            return response(['success'=>true,'msg'=>'Account deleted', 'done'=>true]);
        }else{
            return response(['success'=>false,'msg'=>'An error occured', 'done'=>true]);
        }
    }

    public function dash() {
        $users = User::whereEmail('timi#gmail.com')->first();
        return view('register',['users'=>$users]);
    }
}
