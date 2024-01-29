<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class AdminController extends Controller
{
    // view all categories
    public function view_category(){
        return view('admin.category');
    }

    // get category from post input and save it to db
    // and stay on the same page
    public function add_category(Request $request){
        $data = new category;
        $data->category_name=$request->category;
        $data->save();
        return redirect()->back()->with('message','Category Added Successfully!');
    }
}
