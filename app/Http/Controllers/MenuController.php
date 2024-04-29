<?php

namespace App\Http\Controllers;

use App\Exports\MenuExport;
use App\Models\Menu;
use App\Http\Requests\StoreMenuRequest;
use App\Http\Requests\UpdateMenuRequest;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\MenuImport;
use App\Models\Jenis;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        // $data['menu'] = Menu::get();
        $menu = Menu::with(['jenis'])->latest()->get();
        $jenis = Jenis::pluck('nama', 'id');
        return view('pages.menu.index', compact('menu', 'jenis'));
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
    
    public function store(StoreMenuRequest $request)
    {
        $menu = Menu::create($request->all());

        // Mendapatkan file yang diunggah oleh pengguna
        $file = $request->file('image');

        // Menyimpan file gambar ke direktori penyimpanan 'menu' dengan nama yang unik
        $file_name = $file->getClientOriginalName(); // Nama file asli
        $file_path = $file->storeAs('menu', $file_name); // Simpan file dengan nama unik di direktori 'menu'

        // Simpan nama file ke dalam kolom image di database
        $menu->image = $file_path;
        $menu->save();

        return redirect('menu')->with('success', 'Data menu berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMenuRequest $request, Menu $menu)
    {
        $menu->update($request->all());

        if($request->oldImage){
            Storage::delete($menu->oldImage);
        }

        // Menyimpan file gambar ke direktori penyimpanan 'menu' dengan nama yang unik
        $file_name = $request->image->getClientOriginalName(); // Nama file asli
        $file_path = $request->image->storeAs('menu', $file_name); // Simpan file dengan nama unik di direktori 'menu'

        // Simpan nama file ke dalam kolom image di database
        $menu->image = $file_path;
        $menu->save();


        return redirect('menu')->with('success', 'Data menu berhasil di Edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        if($menu->image){
            Storage::delete($menu->image);
        }

        $menu->delete();

        return redirect('menu')->with('success', 'Data menu berhasil dihapus');
    }

    public function export() 
    {
        $date = now()->format('j-M-Y-s');
        return Excel::download(new MenuExport, $date. '_Menu.xlsx');
    }

    public function import(Request $request){
        $data = $request->file('file');
        $namafile = $data->getClientOriginalName();
        $data->move('DataMenu', $namafile);
        Excel::import(new MenuImport, \public_path('/DataMenu/'.$namafile));
        return redirect()->back()->with('success', 'Import data berhasil');
    }
}


