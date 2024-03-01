<?php

namespace App\Http\Controllers;

use App\Exports\PelangganExport;
use App\Models\Pelanggan;
use App\Http\Requests\StorePelangganRequest;
use App\Http\Requests\UpdatePelangganRequest;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PelangganImport;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['pelanggan'] = Pelanggan::get();
        return view('pages.pelanggan.index')->with($data);
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
    
    public function store(StorePelangganRequest $request)
    {
        Pelanggan::create($request->all());


        return redirect('pelanggan')->with('success', 'Data pelanggan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePelangganRequest $request, Pelanggan $pelanggan)
    {
        $pelanggan->update($request->all());

        return redirect('pelanggan')->with('success', 'Data pelanggan berhasil di Edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pelanggan $pelanggan)
    {
        $pelanggan->delete();

        return redirect('pelanggan')->with('success', 'Data pelanggan berhasil dihapus');
    }

    public function export() 
    {
        $date = now()->format('j-M-Y');
        return Excel::download(new PelangganExport, $date.'_pelanggan.xlsx');
    }

    public function import(Request $request){
        $data = $request->file('file');
        $namafile = $data->getClientOriginalName();
        $data->move('DataPelanggan', $namafile);
        Excel::import(new PelangganImport, \public_path('/DataPelanggan/'.$namafile));
        return redirect()->back()->with('success', 'Import data berhasil');
    }
}


