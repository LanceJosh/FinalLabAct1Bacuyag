<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Category extends Model
{
   use HasFactory;
   use SoftDeletes;

   protected $fillable = ['category_name', 'user_id', 'image'];

   public static function addCategory($categoryName, $image)
   {
       $category = new Category;
       $category->category_name = $categoryName;
       $category->user_id = Auth::id();

       if($image) {
           $filename = time().'.'.$image->getClientOriginalExtension();
           $image->move(public_path('images'), $filename);
           $category->image = $filename;
       }

       $category->save();
   }
}
