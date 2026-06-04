<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            //'parent_id' => 'nullable|exists:categories,id',
            'title'     => 'required|string|max:255',
            'keywords'  => 'nullable|string|max:255',
            'description' => 'nullable|string|max:255',
            'image'     => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            //'status'    => 'required|boolean',
        ]);
    
              $category = new Category();
                $category->parent_id = $request->input('parent_id', 0); 
                $category->title = $validated['title'];
                $category->keywords = $validated['keywords'] ?? null;
                $category->description = $validated['description'] ?? null;
                $category->status = $request->input('status', 1);

        if ($request->hasFile('image')) {
            $category['image'] = $request->file('image')->store('categories', 'public');
        }
    
        $category->save();
    
        return redirect()
            ->route('categories.index')
            ->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
