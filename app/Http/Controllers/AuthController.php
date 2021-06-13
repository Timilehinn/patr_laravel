<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class AuthController extends Controller
{

    public function createUser(Request $request){

        $_user = User::where('email',request('email'))->first(); // to check if email is already registerd
        if($_user){
            return response(['msg'=>'An Account with that email is already registered.','done'=>true,'success'=>false]);
        }else{
            $user = new User();
            $user->name = request('name');
            $user->email = request('email');
            $user->username = request('username');
            $user->password = bcrypt(request('password'));
            if(!$user->name || !$user->email || !$user->username || !request('password')){
                return response(['msg'=>'Input Payload cannot be empty','done'=>true,'success'=>false]);
            }else{
                $user->save();
                return response(['msg'=>'Account successfully created','done'=>true,'success'=>true]);
            }
           
            $response = [
                'user' => $user,
            ];
            return response($response,201);
        }
    }

    public function loginUser(Request $request){
        $user = User::where('email',request('email'))->first();
        $creds = request()->only(['email,password']);

        if(!request('email') || !request('password')){
            return response(['msg' => 'Loing input value cannot be empty','done'=>true,'success'=>false], 201);
        }elseif($user){
            error_log(request('password'));
            if(Hash::check(request('password'),$user->password )){
                $token = $user->createToken('mytoken')->plainTextToken;
                $msg = 'Login successful';
                $authenticated_email = $user->email;
                return response([
                    'authemail'=>$authenticated_email,
                    'msg'=>$msg,
                    'auth'=>true,
                    'success'=>true,
                    'done'=>true,
                    'token'=>$token
                ],201);
            }else{
                return response(['msg' => 'Password mismatch, try again','done'=>true,'success'=>false], 201);
            }
        }else{
            return response(['msg' => 'No account registered with that email','done'=>true,'success'=>false], 201);
        }
    }

    public function VerifyToken(Request $request){
        error_log('timi'); 

        // RETURNS USER DETAILS AFTER VALIDATING THE TOKEN

        $email = $request->header('Email');

        $user = User::where('email',$email)->first(['id','email','username','name']);

        return response(['msg'=>'authentiation passed', 'details'=> $user, 'authenticated'=>true]);
    }


}
