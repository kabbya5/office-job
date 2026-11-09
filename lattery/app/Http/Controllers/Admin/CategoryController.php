<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::orderBy('position','desc')->get();
        return view('admin.categories.index',compact('categories'));
    }

    public function create(){
        $category = new Category();
        return view('admin.categories.create',compact('category'));
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|unique:categories,name',
            'image_path' => 'required',
        ]);

        Category::create([
            'name' => $request->name,
            'image_path' => $request->image_path,
        ]);

        return redirect()->route('admin.categories.index')->with('success', 'Country created successfully.');
    }

    public function edit(Country $country){
        return view('admin.country.edit', compact('country'));
    }
}
