<?php

namespace App\Http\Controllers;

use App\Exports\JenisExport;
use App\Models\Jenis;
use App\Http\Requests\StoreJenisRequest;
use App\Http\Requests\UpdateJenisRequest;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\JenisImport;
use App\Models\Category;
use Illuminate\Http\Request;

class JenisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $data['jenis'] = Jenis::get();
        $jenis = Jenis::with(['kategory', 'menu'])->latest()->get();
        // dd($jenis);
        $category = Category::pluck('nama', 'id');
        // dd($jenis);

        return view('pages.jenis.index', compact('jenis', 'category'));
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
    
    public function store(StoreJenisRequest $request)
    {
        Jenis::create($request->all());


        return redirect('jenis')->with('success', 'Data jenis berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jenis $jeni)
    {
        $jenis = Jenis::with(['kategory', 'menu'])->latest()->get();
        return view('pages.pemesanan.index', [
            'jenis' => $jenis,
            'menus' => $jeni->menu
            
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jenis $jenis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJenisRequest $request, Jenis $jeni)
    {
        $jeni->update($request->all());

        return redirect('jenis')->with('success', 'Data jenis berhasil di Edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jenis $jeni)
    {
        $jeni->delete();

        return redirect('jenis')->with('success', 'Data jenis berhasil dihapus');
    }

    public function export() 
    {
        $date = now()->format('j-M-Y');
        return Excel::download(new JenisExport, $date.'_jenis.xlsx');
    }

    // public function import(Request $request){
    //     $data = $request->file('file');
    //     $namafile = $data->getClientOriginalName();
    //     $data->move('jenisData', $namafile);
    //     Excel::import(new jenisImport, \public_path('/jenisData/'.$namafile));
    //     return redirect()->back()->with('success', 'Import data berhasil');
    // }
}


