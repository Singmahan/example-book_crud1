<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Redis;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::latest()->get();
        return view('categories', compact('categories'));
    }
    public function store(Request $request){
        // test input
        // dd($request->input());
        $category = new Category();
        $request->validate([
            'textcategory' => 'required'
        ]);
        // category = textcategory
        $category->category = $request->textcategory;
        $category->save();

        return redirect()->route('manage-category')->with('success','Added Successfully.');
    }
    public function edit($id){
        $category_detail = Category::where('id',$id)->get();
        return view('edit_category', compact('category_detail'));
    }
    public function update(Request $request, $id){
        $category = Category::where('id',$id)->first();
        $request->validate([
            'textcategory' => 'required'
        ]);
        $category->category = $request->textcategory;
        $category->update();

        return redirect()->route('manage-category')->with('success','Updated Successfully.');
    }
    public function delete($id){
        Category::where('id',$id)->delete();
        return redirect()->route('manage-category')->with('success','Deleted Successfully.');
    }
}
