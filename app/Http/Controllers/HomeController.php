<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Category;

class HomeController extends Controller
{
    // home page
    public function index()
    {
        $category = Category::all();
        return view('home.userpage',compact('category'));
    }
    // route to dashboard if user is a normal user of 0 and 1 to admin to admin panel
    public function redirect()
    {
        $usertype = Auth::user()->usertype;
        if ($usertype == '1') {
            return view('admin.home');
        } else {
            return view('home.userpage');
        }
    }
    // function to handle to shop page data and content
    public function shop()
    {
        return view('shop.index');
    }

    public function contact_us(){
        return view('home.contact');
    }

    public function about_us(){
        return view('home.about');
    }

    public function faq(){
        return view('home.faq');
    }
}
