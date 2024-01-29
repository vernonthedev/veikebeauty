<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class AdminController extends Controller
{
    // view all categories from db
    public function view_category()
    {
        $data = Category::all();
        return view('admin.category', compact('data'));
    }

    // get category from post input and save it to db 
    // and stay on the same page
    public function add_category(Request $request)
    {
        $data = new Category();
        $data->category_name = $request->category;
        $data->save();
        return redirect()->back()->with('message', 'Category Added Successfully!');
    }

    // delete the category, display msg for successful deletion and return to same pg
    public function delete_category($id)
    {
        $data = Category::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Category Deleted Successfully');
    }
    // view and manage product content $ pass the categories to this view
    public function view_products()
    {
        $category = Category::all();
        return view('admin.product', compact('category'));
    }
    // create a new product
    public function add_product(Request $request)
    {
        $product = new Product();
        $product->title = $request->title;
        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;
        $product->price = $request->price;
        $product->brand = $request->brand;
        $product->discount_price = $request->discount_price;

        // Check if the checkbox is checked, and set the boolean value accordingly
        $product->is_featured = $request->has('is_featured');
        $product->is_new_arrival = $request->has('is_new_arrival');
        $product->is_deal_of_the_day = $request->has('is_deal');

        $product->quantity = $request->quantity;
        $product->slug = $request->slug;
        $product->meta_title = $request->meta_title;
        $product->meta_description = $request->meta_description;
        $product->category = $request->category;

        // getting the image by setting each image with unique names by using the time of upload
        // and will be saved under the /product folder
        $image = $request->image;
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move('product', $imagename);
        $product->image = $imagename;

        //save the product
        $product->save();

        return redirect()->back()->with('message', 'Product Successfully Uploaded.');
    }

    // View all products added to the shop
    public function show_products(){
        $data = Product::all();
        return view('admin.show_products', compact('data'));
    }
}
