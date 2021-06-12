<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DashController extends Controller
{
    public function index() {
        $usersDetails = User::whereEmail('timi#gmail.com')->first();
        return view('dashboard',['users_details'=>$usersDetails]);
    }

    public function register() {
        return view('register',['users'=>$users]);
    }
}
