<?php

namespace App\Http\Controllers;

use App\Exports\ProdukTitipanExport;
use App\Models\ProdukTitipan;
use App\Http\Requests\StoreProdukTitipanRequest;
use App\Http\Requests\UpdateProdukTitipanRequest;
use App\Imports\ProdukTitipanImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class ProdukTitipanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produk = ProdukTitipan::all();
        return view('pages.produk.index', compact('produk'));
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
    public function store(StoreProdukTitipanRequest $request)
    {
        ProdukTitipan::create($request->all());
        return redirect()->back()->with('success', 'Data produk tersimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProdukTitipan $produkTitipan)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProdukTitipan $produkTitipan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProdukTitipanRequest $request, ProdukTitipan $produkTitipan)
    {
        $produkTitipan->update($request->all());
        return redirect('produk_titipan')->with('success', 'Data Berhasil Di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProdukTitipan $produkTitipan)
    {
        $produkTitipan->delete();
        return redirect()->back()->with('success', 'Data Berhasil Dihapus');
    }


    public function export() 
    {
        $date = now()->format('j-M-Y');
        return Excel::download(new ProdukTitipanExport, $date.'_produk_titipan.xlsx');
    }

    public function import(Request $request){
        $file = $request->file('file');
        $namafile = $file->getClientOriginalName();
        $file->move('DataProdukTitipan', $namafile);
        Excel::import(new ProdukTitipanImport, \public_path('/DataProdukTitipan/'.$namafile));
        return redirect()->back()->with('success', 'Import data berhasil');
    }
}
