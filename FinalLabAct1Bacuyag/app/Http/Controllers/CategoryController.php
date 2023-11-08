<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::all();
        return view('admin.category.category',compact('categories'));
    }

    public function store(Request $request)
    {
        Category::addCategory($request->category_name);

        return redirect()->route('AllCat')->with('success', 'Category added successfully');
    }
}
