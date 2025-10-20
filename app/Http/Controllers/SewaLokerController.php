<?php

namespace App\Http\Controllers;

use App\Models\SewaLoker;
use App\Models\Loker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;

class SewaLokerController extends Controller
{
    public function index()
    {
        $sewa = SewaLoker::where('user_id', Auth::id())->get();
        return view('sewa.index', compact('sewa'));
    }

    public function create()
    {
        $lokers = Loker::where('status', 'tersedia')->get();
        return view('sewa.create', compact('lokers'));
    }

    public function store(Request $request)
    {
        $no_hp = Auth::user()->no_hp;
        $NIK =  Auth::user()->NIK;

        if (!$no_hp or !$NIK) {
            return redirect()->route('sewa.index')->with('success', 'Gagal sewa user belum memasukan Nomor Telepon atau NIK');
        }

        $request->validate([
            'loker_id' => 'required|exists:lokers,id',
            'tanggal_mulai' => 'required|date',
            'tanggal_akhir' => 'nullable|date|after:tanggal_mulai',
        ]);
        $kombinasiPassword = Str::random(12);
        $loker = Loker::findOrFail($request->loker_id);
        $denda_loker = $loker->harga_per_hari + ($loker->harga_per_hari * 20 / 100);
        $sewa = SewaLoker::create([
            'user_id' => Auth::id(),
            'loker_id' => $loker->id,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_akhir' => $request->tanggal_akhir,
            'harga_per_hari' => $loker->harga_per_hari,
            'harga_per_hari_denda' => $denda_loker,
            'kombinasi_password' => $kombinasiPassword,
            'keterangan_loker' => 'belum dibuka',
        ]);

        $loker->update(['status' => 'disewa']);

        return redirect()->route('sewa.index')->with('success', 'Sewa berhasil dibuat');
    }

    public function show($id)
    {
        $sewa = SewaLoker::where('user_id', Auth::id())->findOrFail($id);
        return view('sewa.show', compact('sewa'));
    }
    public function open($id)
    {
        $sewa = SewaLoker::where('user_id', Auth::id())->findOrFail($id);
        SewaLoker::where('id', $id)->update(['keterangan_loker' => 'sudah dibuka']);
        return redirect()->back()->with('success', 'Loker berhasil dibuka');
    }
    public function selesai($id)
    {
        $sewa = SewaLoker::where('user_id', Auth::id())->findOrFail($id);
        $tanggalMulai = Carbon::parse($sewa->tanggal_mulai);
        $tanggal_akhir = Carbon::now();
        $jumlah_hari = $tanggalMulai->diffInDays($tanggal_akhir);
        $jumlah_hari = max(1, $jumlah_hari);
        $jumlah_harga = 0;
        $jumlah_hari_baru = 0;
        if ($jumlah_hari > 2) {
            $jumlah_harga = $sewa->harga_per_hari * 2;
            $jumlah_hari_baru = $jumlah_hari - 2;
        } else {
            $jumlah_harga = $sewa->harga_per_hari * $jumlah_hari;
            $jumlah_hari_baru = 0;
        }
        $jumlah_harga += $sewa->harga_per_hari_denda * $jumlah_hari_baru;

        SewaLoker::where('id', $id)->update([
            'keterangan_loker' => 'sudah dibuka',
            'status_sewa' => 'selesai',
            'tanggal_akhir' => Carbon::now(),
            'total_harga' => $jumlah_harga,
        ]);
        Loker::where('id', $sewa->loker_id)->update([
            'status' => 'tersedia',
        ]);
        return redirect()->back()->with('success', 'Loker berhasil dibuka');
    }
}
