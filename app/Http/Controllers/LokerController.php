<?php

namespace App\Http\Controllers;

use App\Models\Loker;
use Illuminate\Http\Request;

class LokerController extends Controller
{
    public function index()
    {
        $lokers = Loker::all();
        return view('lokers.index', compact('lokers'));
    }

    public function create()
    {
        return view('lokers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_loker' => 'required|unique:lokers',
            'lokasi' => 'nullable|string',
            'harga_per_hari' => 'required|numeric',
            'status' => 'required|in:tersedia,disewa,nonaktif',
            'ukuran' => 'required|in:besar,kecil',
        ]);

        Loker::create($validated);
        return redirect()->route('lokers.index')->with('success', 'Loker berhasil ditambahkan');
    }

    public function edit(Loker $loker)
    {
        return view('lokers.edit', compact('loker'));
    }

    public function update(Request $request, Loker $loker)
    {
        $validated = $request->validate([
            'lokasi' => 'nullable|string',
            'harga_per_hari' => 'required|numeric',
            'status' => 'required|tersedia,disewa,nonaktif',
            'ukuran' => 'required|in:besar,kecil',
        ]);

        $loker->update($validated);
        return redirect()->route('lokers.index')->with('success', 'Data loker diperbarui');
    }

    public function destroy(Loker $loker)
    {
        $loker->delete();
        return redirect()->route('lokers.index')->with('success', 'Loker dihapus');
    }
}
