<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;
class HomeController extends Controller
{
    // home page with paginated product display
    public function index()
    {
        $category = Category::all();
        $products = Product::paginate(15);
        return view('home.userpage',compact('category'));
    }
    // route to dashboard if user is a normal user of 0 and 1 to admin to admin panel
    public function redirect()
    {
        $usertype = Auth::user()->usertype;
        if ($usertype == '1') {
            return view('admin.home');
        } else {
            $category = Category::all();
            $products = Product::paginate(15);
            return view('home.userpage', compact('products', 'category'));
        }
    }
    // function to handle to shop page data and content
    public function shop()
    {
        $category = Category::all();
        $products = Product::paginate(15);
        return view('shop.index', compact('products','category'));
    }

    // Get product details
    public function product_details($id){
        $products = Product::find($id);
        return view('shop.details', compact('products'));
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
