<?php

namespace App\Http\Controllers;

use App\Exports\MejaExport;
use App\Models\Meja;
use App\Http\Requests\StoreMejaRequest;
use App\Http\Requests\UpdateMejaRequest;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\MejaImport;
use Illuminate\Http\Request;

class MejaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['meja'] = Meja::get();
        return view('pages.meja.index')->with($data);
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
    
    public function store(StoreMejaRequest $request)
    {
        Meja::create($request->all());


        return redirect('meja')->with('success', 'Data meja berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Meja $meja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Meja $meja)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMejaRequest $request, Meja $meja)
    {
        $meja->update($request->all());

        return redirect('meja')->with('success', 'Data meja berhasil di Edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Meja $meja)
    {
        $meja->delete();

        return redirect('meja')->with('success', 'Data meja berhasil dihapus');
    }

    public function export() 
    {
        $date = now()->format('j-M-Y');
        return Excel::download(new MejaExport, $date.'_meja.xlsx');
    }

    public function import(Request $request){
        $data = $request->file('file');
        $namafile = $data->getClientOriginalName();
        $data->move('DataMeja', $namafile);
        Excel::import(new MejaImport, \public_path('/DataMeja/'.$namafile));
        return redirect()->back()->with('success', 'Import data berhasil');
    }
}


