<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware("auth");
        view()->share("subcategory_menu", "active");
    }
    /**
     * Display a listing of the resource.
     */

     public function index()
    {
        $subcategories = Subcategory::all();
        return view('subcategories.index', compact('subcategories'));
    }
    // public function index()
    // {
    //     $subcategories = Subcategory::paginate(config("system.pagination.per_page"));
    //     return view('subcategories.index', compact('subcategories'));
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::all();
        return view('subcategories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        //dd($request);

        $subcategory= new Subcategory();
        $subcategory->category_id = $request->category_id;
        $subcategory->name = $request->name;
        $subcategory->save();

        // $category->subcategories()->create($request->all());

        return redirect()->route('subcategories.index')->with('success', 'Subcategory created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subcategory $subcategory)
    {
        $categories=Category::all();
        return view('subcategories.edit', compact('categories', 'subcategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subcategory $subcategory)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $subcategory->update($request->all());

        return redirect()->route('subcategories.index')->with('success', 'Subcategory updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subcategory $subcategory)
    {
        $subcategory->delete();

        return redirect()->route('subcategories.index',)->with('success', 'Subcategory deleted successfully.');
    }
}
