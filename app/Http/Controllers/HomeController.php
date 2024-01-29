<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
    // home page
    public function index(){
        return view('home.userpage');
    }
    // route to dashboard if user is a normal user of 0 and 1 to admin to admin panel
    public function redirect(){
        $usertype = Auth::user()->usertype;
        if($usertype=='1'){
            return view('admin.home');
        }else{
            return view('home.userpage');
        }
        
    }
}
