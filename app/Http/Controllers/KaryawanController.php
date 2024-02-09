<?php

namespace App\Http\Controllers;

use App\Exports\KaryawanExport;
use App\Models\Karyawan;
use App\Http\Requests\StoreKaryawanRequest;
use App\Http\Requests\UpdateKaryawanRequest;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\KaryawanImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $karyawan = Karyawan::create($request->all());        

        $file = $request->file('foto');

        $file_name = $file->getClientOriginalName();
        $file_path = $file->storeAs('karyawan', $file_name);

        $karyawan->foto = $file_path;
        $karyawan->save();

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

        if($request->oldImage){
            Storage::delete($karyawan->oldImage);
        }

        // Menyimpan file gambar ke direktori penyimpanan 'k$karyawan' dengan nama yang unik
        $file_name = $request->foto->getClientOriginalName(); // Nama file asli
        $file_path = $request->foto->storeAs('karyawan', $file_name); // Simpan file dengan nama unik di direktori 'k$karyawan'

        // Simpan nama file ke dalam kolom image di database
        $karyawan->foto = $file_path;
        $karyawan->save();

        return redirect('karyawan')->with('success', 'Data karyawan berhasil di Edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Karyawan $karyawan)
    {
        if($karyawan->foto){
            Storage::delete($karyawan->foto);
        }

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


