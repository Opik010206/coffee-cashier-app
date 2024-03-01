<?php

namespace App\Http\Controllers;

use App\Exports\StockExport;
use App\Models\Stock;
use App\Http\Requests\StoreStockRequest;
use App\Http\Requests\UpdateStockRequest;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\StockImport;
use App\Models\Menu;
use Illuminate\Http\Request;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stock = Stock::with(['menu'])->latest()->get();
        $menu = Menu::pluck('nama', 'id');
        // dd($menu);
        // $data['stock'] = Stock::get();
        return view('pages.stock.index', compact('stock', 'menu'));
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
    
    public function store(StoreStockRequest $request)
    {
        Stock::create($request->all());


        return redirect('stock')->with('success', 'Data stock berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Stock $stock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stock $stock)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStockRequest $request, stock $stock)
    {
        $stock->update($request->all());

        return redirect('stock')->with('success', 'Data stock berhasil di Edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stock $stock)
    {
        $stock->delete();

        return redirect('stock')->with('success', 'Data stock berhasil dihapus');
    }

    public function export() 
    {
        $date = now()->format('j-M-Y');
        return Excel::download(new StockExport, $date.'_stock.xlsx');
    }

    public function import(Request $request){
        $file = $request->file('file');
        $namafile = $file->getClientOriginalName();
        $file->move('DataStock', $namafile);
        Excel::import(new StockImport, \public_path('/DataStock/'.$namafile));
        return redirect()->back()->with('success', 'Import data berhasil');
    }
}


