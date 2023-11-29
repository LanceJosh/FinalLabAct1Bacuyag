<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::all();
        return view('admin.category.category',compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
   
        $imageName = time().'.'.$request->image->extension(); 
        $request->image->move(public_path('images'), $imageName);
   
        Category::create([
            'category_name' => $request->category_name,
            'user_id' => Auth::user()->id,
            'image' => $imageName,
        ]);
   
        return redirect()->route('AllCat')->with('success', 'Category added successfully');
    }
   

    public function edit($id){
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
     }
     
    function Delete($id){
        $category = Category::find($id);
        $category->delete();
        return Redirect()->back();
    }
    public function update(Request $request, $id){
        $request->validate([
            'category_name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
   
        $imageName = time().'.'.$request->image->extension(); 
        $request->image->move(public_path('images'), $imageName);
   
        $update = Category::find($id)->update([
            'category_name'=>$request->category_name,
            'user_id'=>Auth::user()->id,
            'image' => $imageName,
        ]);
   
        return Redirect()->route('AllCat')->with ('success', 'Updated Successfully');
    }
   
    
    
}
