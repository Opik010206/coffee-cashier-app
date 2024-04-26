<?php

namespace App\Http\Controllers;

use App\Exports\AbsensiExport;
use App\Models\Absensi;
use App\Http\Requests\StoreAbsensiRequest;
use App\Http\Requests\UpdateAbsensiRequest;
use App\Imports\AbsensiImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Dompdf\Dompdf;
use Dompdf\Options;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $absensi = Absensi::all();
        return view('pages.absensi.index', compact('absensi'));
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
    public function store(StoreAbsensiRequest $request)
    {
        Absensi::create($request->all());
        return redirect('absensi')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Absensi $absensi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Absensi $absensi)
    {
        return response()->json(['result' => $absensi]);
        
    }

    public function editStatus(Request $request){
        return 'halo';
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAbsensiRequest $request, Absensi $absensi)
    {
        $absensi->update($request->all());
        return response()->json(['result' => $absensi]);
        // return redirect('absensi')->with('success', 'Data berhasil ditambahkan');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Absensi $absensi)
    {
        $absensi->delete();
        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }

    public function export() 
    {
        $date = now()->format('j-M-Y');
        return Excel::download(new AbsensiExport, $date.'absensi.xlsx');
    }

    public function import(Request $request){
        $data = $request->file('file');
        $namafile = $data->getClientOriginalName();
        $data->move('DataAbsensi', $namafile);
        Excel::import(new AbsensiImport, \public_path('/DataAbsensi/'.$namafile));
        return redirect()->back()->with('success', 'Import data berhasil');
    }

    public function generatePdf()
    {
        $data['absensi'] = Absensi::get();

        // Load view
        $pdf = new Dompdf();
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $pdf->setOptions($options);
        $pdf->loadHtml(view('pages.absensi.pdf', $data)->render());

        // (Optional) Set paper size and orientation
        $pdf->setPaper('A4', 'portrait');

        // Render PDF (optional: save to file)
        $pdf->render();

        // Output PDF to browser
        return $pdf->stream('document.pdf');
    }
}
