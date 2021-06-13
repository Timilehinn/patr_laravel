<?php

namespace App\Http\Controllers;
// namespace App\Http\Controllers; revert back

use Illuminate\Http\Request;
use Illuminate\Http\Response;
// use Response;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index() {
        return view('home');
    } 

    public function user($email){
        $user = User::where('email',$email)->first();
        return response(['user'=>$user]);
    }

    // public function allusers(){
    //         $user = User::all();
    //         return response(['users'=>$user]);
       
    // }

    public function updateDetails(Request $request){
        if(request('email') and request('name') and request('username') and request('password')){
            $user = User::where('email',request('email'))->update([
                'email'=>request('email'),
                'name'=>request('name'),
                'username'=>request('username'),
                'password'=>bcrypt(request('password')),
            ]);
            if($user == 1){
                return response(['success'=>true,'msg'=>'Profile Information Updated', 'done'=>true]);
            }else{
                return response(['success'=>false, 'msg'=>'An Error Occurred','done'=>true]);
            }
        }else{
            return response(['success'=>false, 'msg'=>'Input cannot be empty','done'=>true]);
        }
    }

    public function deleteUser($email){
        $user = User::where('email',$email)->delete();
        if($user == 1){
            return response(['success'=>true,'msg'=>'Account deleted', 'done'=>true]);
        }else{
            return response(['success'=>false,'msg'=>'User not found', 'done'=>true]);
        }
    }

}
