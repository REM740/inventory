<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;



class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all(); // Fetch all items from the database
        return view('index', compact('items'));
        $items = Item::with('category')->get();
        return view('items.index', compact('items'));
        // Pass $items to the view
    }
    public function create()
    {
        $categories = Category::all(); // Fetch categories for the dropdown
        return view('create', compact('categories'));
    }
    public function store(Request $request)
    {
        // Validate form input
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id'
        ]);
        Item::create([
            'name' => $request->name,
            'price' => $request->price,
            'category_id' => $request->category_id
        ]);
        return redirect()->route('items.index')->with('success', 'Item added successfully!');
}

public function edit($id)
{
    $item = Item::findOrFail($id);
    $categories = Category::all();

    return view('items.edit', compact('item', 'categories'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric|min:0',
        'category_id' => 'required|exists:categories,id',
    ]);
    $item = Item::findOrFail($id);
    $item->update($request->only('name', 'price', 'category_id'));

    return redirect()->route('items.index')->with('success', 'Item updated successfully!');
}

}
