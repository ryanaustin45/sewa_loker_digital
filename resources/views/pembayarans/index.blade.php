@extends('layouts.admin')
@section('title', 'Data Pembayaran')
@section('content')
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Penyewa</th>
                <th>Loker</th>
                <th>Total</th>
                <th>Status</th>
                <th>Tanggal Bayar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pembayarans as $p)
                <tr>
                    <td>{{ $p->sewaLoker->user->name ?? '-' }}</td>
                    <td>{{ $p->sewaLoker->loker->kode_loker ?? '-' }}</td>
                    <td>Rp {{ number_format($p->total_bayar, 0, ',', '.') }}</td>
                    <td>
                        <span
                            class="badge bg-{{ $p->status == 'lunas' ? 'success' : 'secondary' }}">{{ ucfirst($p->status) }}</span>
                    </td>
                    <td>{{ $p->tanggal_bayar ?? '-' }}</td>
                    <td>
                        @if ($p->status != 'lunas')
                            <a href="{{ route('pembayarans.konfirmasi', $p->sewa_loker_id) }}"
                                class="btn btn-sm btn-primary">Konfirmasi</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
