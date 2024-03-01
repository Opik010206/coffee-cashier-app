<?php

namespace App\Http\Controllers;

use App\Exports\CategoryExport;
use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\CategoryImport;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['category'] = Category::get();
        return view('pages.category.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // 
    }

    /**
     * Store a newly created resource in storage.
     */
    
    public function store(StoreCategoryRequest $request)
    {
        Category::create($request->all());


        return redirect('category')->with('success', 'Data category berhasil ditambahkan');
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
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update($request->all());

        return redirect('category')->with('success', 'Data category berhasil di Edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect('category')->with('success', 'Data category berhasil dihapus');
    }

    public function export() 
    {
        $date = now()->format('j-M-Y');
        return Excel::download(new CategoryExport, $date.'_category.xlsx');
    }

    public function import(Request $request){
        $file = $request->file('file');
        $namafile = $file->getClientOriginalName();
        $file->move('DataCategory', $namafile);
        Excel::import(new CategoryImport, public_path('/DataCategory/'.$namafile));
        return redirect()->back()->with('success', 'Import data berhasil');
    }
}


