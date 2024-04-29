<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Http\Requests\TransaksiRequest;
use App\Models\DetailTransaksi;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use PDOException;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(TransaksiRequest $request)
    {
        // dd($request);
        try {
            DB::beginTransaction();
            // $validated = $request->validate();
            // Ambil ID terakhir dari transaksi
            $last_id = Transaksi::latest()->first();

            // Ambil tanggal hari ini
            $tanggal_hari_ini = date('Ymd');

            // Buat nomor transaksi baru
            $notrans = $last_id ? $tanggal_hari_ini . sprintf('%04d', intval(substr($last_id->id, -4)) + 1) : $tanggal_hari_ini . '0001';

            // dd($notrans);
    
            Transaksi::create([
                'id' => $notrans,
                'tanggal' => date('Y-m-d'),
                'total_harga' => $request->total,
                'metode_pembayaran' => 'cash',
                'keterangan' => ''
            ]);

            // if (!$insertTransaksi->exitsts) return 'error';

            // input detail transaksi
            foreach ($request->orderedList as $detail) {
                DetailTransaksi::create([
                    'transaksi_id' => $notrans,
                    'menu_id' => $detail['menu_id'],
                    'jumlah' => $detail['qty'],
                    'subtotal' => $detail['harga'] * $detail['qty']
                ]);
            }

            DB::commit();
            return response()->json(['status' => true, 'message'=>'Pemesanan berhasil', 'notrans' => $notrans]);
        } catch (Exception | QueryException | PDOException $e){
            return response()->json(['status' => false, 'message'=>'Pemesanan Gagal', 'error' => $e->getMessage()]);
            DB::rollBack();
        }

        // return $insertTransaksi;
    }

    public function faktur($notafaktur)
    {
        try{
            $data['transaksi'] = Transaksi::where('id', $notafaktur)->with(['detailTransaksi' => function($query){
                $query->with('menu');
            }])->first();

            return view('pages.pemesanan.faktur')->with($data);
        } catch (Exception | QueryException | PDOException $e) {
            return response()->json(['status'=>false, 'message' => 'Pemesanan Gagal']);
        }
        // $transaksi = Transaksi::findOrFail($notafaktur);
        // return view('pages.pemesanan.faktur', compact('transaksi'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TransaksiRequest $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }
}
