<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaksi;
use App\Models\Menu;
use App\Models\Stock;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function dashboard(){
        $user = Auth::user();
        $menu = Menu::where('harga', '<=', 5000)->get();
        $stok = Stock::get();
        $terjual = DetailTransaksi::select('menu_id', DB::raw('SUM(jumlah) as total_terjual'))
            ->groupBy('menu_id')
            ->get();
        $jumlahTransaksi = Transaksi::count();
        $jumlahPendapatan = Transaksi::sum('total_harga');

        // $transaksis = Transaksi::latest()->take(5)->get();

        // $transaksi_terbaru = DetailTransaksi::select('detail_transaksis.*', 'transaksis.tanggal', 'transaksis.total_harga', 'transaksis.metode_pembayaran', 'transaksis.keterangan')
        // ->join('transaksis', 'detail_transaksis.transaksi_id', '=', 'transaksis.id')
        // ->orderBy('transaksis.tanggal', 'desc')
        // ->limit(5) // Ambil lima transaksi terbaru
        // ->get();

        $terbaru = DetailTransaksi::select('menu_id', DB::raw('SUM(subtotal) as subtotal'))
            ->groupBy('menu_id')
            ->take(5)
            ->get();


            // Ambil data pendapatan dari database
        $pendapatan = Transaksi::pluck('total_harga'); // Misalnya 'jumlah' adalah kolom yang berisi jumlah pendapatan

        // Ubah data pendapatan ke dalam array numerik
        $pendapatanArray = $pendapatan->toArray();

        // Misalnya Anda juga ingin mengambil tahun dari database
        $waktu = Transaksi::pluck('id');

        // Ubah data tahun ke dalam array numerik
        $waktuArray = $waktu->toArray();

        $menus = Menu::where('harga', '<=', 5000)->get();

        return view('pages.dashboard.index', [
            'user' => $user,
            'menu' => $menu,
            'stok' => $stok,
            'terjual' => $terjual,
            'jumlah_transaksi' => $jumlahTransaksi,
            'jumlah_pendapatan' => $jumlahPendapatan,
            // 'harga_menu' => $menus,
            'transaksis' => $terbaru,
            'pendapatan' => $pendapatanArray,
            'waktu' => $waktuArray,
        ]);
    }


    public function about(){
        return view('pages.about.index');
    }
    public function contact(){
        return view('pages.contact');
    }
}
