<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\SewaLoker;
use Illuminate\Http\Request;
use Carbon\Carbon;


class PembayaranController extends Controller
{
    public function index()
    {
        $pembayarans = Pembayaran::with('sewaLoker.user')->get();
        return view('pembayarans.index', compact('pembayarans'));
    }

    public function konfirmasi($id)
    {
        $sewa = SewaLoker::with('user', 'loker')->findOrFail($id);
        return view('pembayarans.konfirmasi', compact('sewa'));
    }

    public function updateStatus(Request $request, $id)
    {
        $sewa = SewaLoker::findOrFail($id);
        $total_harga = 0;
        $jumlah_hari = Carbon::now()->diffInDays(Carbon::parse($sewa->tanggal_mulai));
        if ($jumlah_hari > 2) {
            $total_harga = $jumlah_hari * 2;
            $jumlah_hari -= 2;
        } else {
            $total_harga = $jumlah_hari * $sewa->harga_per_hari;
            $jumlah_hari = 0;
        }
        $total_harga += $jumlah_hari * $sewa->harga_per_hari_denda;

        Pembayaran::updateOrCreate(
            ['sewa_loker_id' => $id],
            [
                'tanggal_bayar' => Carbon::now(),
                'total_bayar' => $total_harga,
                'metode_bayar' => $request->metode_bayar,
                'status' => 'lunas',
            ]
        );

        $sewa->update(['status_sewa' => 'selesai']);
        $sewa->loker->update(['status' => 'tersedia']);

        return redirect()->route('pembayarans.index')->with('success', 'Pembayaran dikonfirmasi');
    }
}
