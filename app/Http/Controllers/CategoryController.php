<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = \App\Models\Category::all(); // Fetch all categories
        return view('categories.index', compact('categories'));
    }

    public function edit($id)
{
    $category = Category::findOrFail($id);
    return view('categories.edit', compact('category'));
}

public function update(Request $request, $id)
{
    $category = Category::findOrFail($id);
    $category->update($request->only('name', 'description'));

    return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
}

}
