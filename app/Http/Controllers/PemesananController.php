<?php

namespace App\Http\Controllers;

use App\Exports\PemesananExport;
use App\Models\Pemesanan;
use App\Http\Requests\StorePemesananRequest;
use App\Http\Requests\UpdatePemesananRequest;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PemesananImport;
use App\Models\Jenis;
use App\Models\Meja;
use App\Models\Menu;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jenis = Jenis::with(['menu'])->latest()->get();
        $menu = Menu::with(['jenis'])->latest()->get();
        $transaksi = Transaksi::all();
        // dd($jenis);

        return view('pages.pemesanan.index', compact('jenis', 'menu', 'transaksi'), [
            'menus' => $menu,
            'jenis' => $jenis
        ]);
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
    
    public function store(StorePemesananRequest $request)
    {
        // dd($request);
        Pemesanan::create($request->all());


        return redirect('pemesanan')->with('success', 'Data pemesanan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pemesanan $pemesanan)
    {
        // return view('pages.pemesanan.index', [
        //     'pemesanan' => $pemesanan,
        //     'jenis' => $pemesanan->jenis
            
        // ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pemesanan $pemesanan)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePemesananRequest $request, Pemesanan $pemesanan)
    {
        $pemesanan->update($request->all());

        return redirect('pemesanan')->with('success', 'Data pemesanan berhasil di Edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pemesanan $pemesanan)
    {
        $pemesanan->delete();

        return redirect('pemesanan')->with('success', 'Data pemesanan berhasil dihapus');
    }

    // public function export() 
    // {
    //     return Excel::download(new PemesananExport, 'pemesanan.xlsx');
    // }

    // public function import(Request $request){
    //     $data = $request->file('file');
    //     $namafile = $data->getClientOriginalName();
    //     $data->move('pemesananData', $namafile);
    //     Excel::import(new pemesananImport, \public_path('/pemesananData/'.$namafile));
    //     return redirect()->back()->with('success', 'Import data berhasil');
    // }
}


