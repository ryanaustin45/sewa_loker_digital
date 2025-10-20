@extends('layouts.admin')
@section('title', 'Detail Sewa')
@section('content')
    @php
        use Carbon\Carbon;
    @endphp
    <div class="card">
        <div class="card-body">
            @php
                $tanggalMulai = Carbon::parse($sewa->tanggal_mulai);
                $tanggal_akhir = $sewa->tanggal_akhir ? $sewa->tanggal_akhir : Carbon::now();
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
                if ($sewa->total_harga > 0) {
                    $jumlah_harga = $sewa->total_harga;
                }
            @endphp
            <h5>Loker: {{ $sewa->loker->kode_loker }}</h5>
            <p>Tanggal Sewa: {{ $sewa->tanggal_mulai }}</p>
            <p>Tanggal Hari ini: {{ $tanggal_akhir }}</p>
            <p>Jumlah Hari: {{ $jumlah_hari }} hari</p>
            <p>Total Harga: Rp {{ number_format($jumlah_harga, 0, ',', '.') }}</p>
            <p>Status: <span class="badge bg-info">{{ ucfirst($sewa->status_sewa) }}</span></p>
            <p>Status buka: <span class="badge bg-info">{{ ucfirst($sewa->keterangan_loker) }}</span></p>
            @if ($sewa->keterangan_loker == 'belum dibuka')
                <a href="{{ route('sewa.open', $sewa->id) }}" class="btn btn-primary mt-3">Buka Loker</a>
            @endif
            @if ($sewa->status_sewa == 'aktif')
                <a href="{{ route('sewa.selesai', $sewa->id) }}" class="btn btn-success mt-3">Pengembalian Loker</a>
            @endif

        </div>
    </div>
    <a href="{{ route('sewa.index') }}" class="btn btn-secondary mt-3">Kembali</a>
@endsection
