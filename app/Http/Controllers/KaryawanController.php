<?php

namespace App\Http\Controllers;

use App\Exports\KaryawanExport;
use App\Models\Karyawan;
use App\Http\Requests\StoreKaryawanRequest;
use App\Http\Requests\UpdateKaryawanRequest;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\KaryawanImport;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['karyawan'] = Karyawan::get();
        return view('pages.karyawan.index')->with($data);
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
    
    public function store(StoreKaryawanRequest $request)
    {
        Karyawan::create($request->all());


        return redirect('karyawan')->with('success', 'Data karyawan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Karyawan $karyawan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Karyawan $karyawan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKaryawanRequest $request, Karyawan $karyawan)
    {
        $karyawan->update($request->all());

        return redirect('karyawan')->with('success', 'Data karyawan berhasil di Edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Karyawan $karyawan)
    {
        $karyawan->delete();

        return redirect('karyawan')->with('success', 'Data karyawan berhasil dihapus');
    }

    // public function export() 
    // {
    //     return Excel::download(new KaryawanExport, 'karyawan.xlsx');
    // }

    // public function import(Request $request){
    //     $data = $request->file('file');
    //     $namafile = $data->getClientOriginalName();
    //     $data->move('karyawanData', $namafile);
    //     Excel::import(new karyawanImport, \public_path('/karyawanData/'.$namafile));
    //     return redirect()->back()->with('success', 'Import data berhasil');
    // }
}


