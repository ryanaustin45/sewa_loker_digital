@extends('layouts.admin')
@section('title', 'Sewa Saya')
@section('content')
    @php
        use Carbon\Carbon;
    @endphp
    <a href="{{ route('sewa.create') }}" class="btn btn-primary mb-3">+ Sewa Baru</a>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Loker</th>
                <th>Tanggal Mulai</th>
                <th>Hari</th>
                <th>Total</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sewa as $item)
                <tr>
                    @php
                        $tanggalMulai = Carbon::parse($item->tanggal_mulai);
                        $tanggal_akhir = $item->tanggal_akhir ? $item->tanggal_akhir : Carbon::now();
                        $jumlah_hari = $tanggalMulai->diffInDays($tanggal_akhir);
                        $jumlah_hari = max(1, $jumlah_hari);
                        $jumlah_harga = 0;
                        $jumlah_hari_baru = 0;
                        if ($jumlah_hari > 2) {
                            $jumlah_harga = $item->harga_per_hari * 2;
                            $jumlah_hari_baru = $jumlah_hari - 2;
                        } else {
                            $jumlah_harga = $item->harga_per_hari * $jumlah_hari;
                            $jumlah_hari_baru = 0;
                        }
                        $jumlah_harga += $item->harga_per_hari_denda * $jumlah_hari_baru;
                        if ($item->total_harga > 0) {
                            $jumlah_harga = $item->total_harga;
                        }
                    @endphp
                    <td>{{ $item->loker->kode_loker }}</td>
                    <td>{{ $item->tanggal_mulai }}</td>
                    <td>{{ $jumlah_hari }} hari</td>
                    <td>Rp {{ number_format($jumlah_harga, 0, ',', '.') }}</td>
                    <td>
                        <span
                            class="badge bg-{{ $item->status_sewa == 'aktif' ? 'info' : ($item->status_sewa == 'selesai' ? 'success' : 'secondary') }}">
                            {{ ucfirst($item->status_sewa) }}
                        </span>
                    </td>
                    <td><a href="{{ route('sewa.show', $item->id) }}" class="btn btn-sm btn-secondary">Detail</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
