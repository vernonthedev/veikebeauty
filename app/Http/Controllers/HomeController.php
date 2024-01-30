<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // home page with paginated product display
    public function index()
    {
        $category = Category::all();
        $products = Product::paginate(15);
        return view('home.userpage', compact('category'));
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
        return view('shop.index', compact('products', 'category'));
    }

    // search items
    public function product_search(Request $request){
        $search_text = $request->search;
        $products = Product::where('title', 'LIKE', "%{$search_text}%")->paginate(15);
        return view('shop.search', compact('products'));
    }

    // Get product details
    public function product_details($id)
    {
        $products = Product::find($id);
        return view('shop.details', compact('products'));
    }

    // add to cart functionality
    public function add_to_cart(Request $request, $id)
    {
        // check if user is logged in, if not send him to login page
        if (Auth::id()) {
            // get logged in user data
            $user = Auth::user();
            // get the products info by id from database
            $product = Product::find($id);
            //create the cart using the provided user and prdt info
            $cart = new Cart;
            // get user info and send it to cart row
            $cart->username = $user->username;
            $cart->email = $user->email;
            $cart->phone = $user->phone;
            $cart->address = $user->address;
            $cart->user_id = $user->id;
            // get the prodt infor and send it to cart row
            $cart->product_title = $product->title;

            // if a product has a discount, then we use that discount price as its original price
            // else we use the original price from the db
            if ($product->discount_price != null) {
                $cart->price = $product->discount_price * $request->quantity;
            } else {
                $cart->price = $product->price * $request->quantity;
            }

            $cart->image = $product->image;
            $cart->Product_id = $product->id;
            // get the total product items from the quantity returned from the web
            $cart->quantity = $request->quantity;


            $cart->save();
            return redirect()->back();
        } else {
            return redirect('login');
        }

        return view('shop.cart');
    }

    // Display the cart items to the usr
    public function show_cart()
    {
        // only return a cart of the logged in user.
        if (Auth::id()) {
            $id = Auth::user()->id;
            $carts = Cart::where('user_id', '=', $id)->get();
            return view('shop.cart', compact('carts'));
        } else {
            return view('login');
        }
    }

    public function remove_cart_item($id){
        $cart = Cart::find($id);
        $cart->delete();
        return redirect()->back();
    }

    public function cash_order()
    {
    //    get currently authenticated user that made the order
    $user = Auth::user();
    $userid = $user->id;
    $data = Cart::where('user_id','=',$userid)->get();
    foreach($data as $data){
        // for each cart data received, save it into a new order
        $order = new Order;
        $order->name = $data->username;
        $order->email = $data->email;
        $order->phone = $data->phone;
        $order->address = $data->address;
        $order->user_id = $data->user_id;

        $order->product_title = $data->product_title;
        $order->quantity = $data->quantity;
        $order->image = $data->image;
        $order->price = $data->price;
        $order->product_id = $data->Product_id;

        $order->payment_status = 'Cash On Delivery';
        $order->delivery_status = 'Processing';

        $order->save();

        // delete the cart data after the order has been made
        $cart_id= $data->id;
        $cart = Cart::find($cart_id);
        $cart->delete();
    }
    return redirect()->back()->with('message','You Order Has Been Received Successfully! We Will Contact You Soon!');
    }

    public function contact_us()
    {
        return view('home.contact');
    }

    public function about_us()
    {
        return view('home.about');
    }

    public function faq()
    {
        return view('home.faq');
    }
}
