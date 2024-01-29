<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class AdminController extends Controller
{
    // view all categories from db
    public function view_category(){
        $data = category::all();        
        return view('admin.category',compact('data'));
    }

    // get category from post input and save it to db 
    // and stay on the same page
    public function add_category(Request $request){
        $data = new category;
        $data->category_name=$request->category;
        $data->save();
        return redirect()->back()->with('message','Category Added Successfully!');
    }

    // delete the category, display msg for successful deletion and return to same pg
    public function delete_category($id){
        $data = category::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Category Deleted Successfully');
    }
}
