@extends('layouts.admin')
@section('title', 'Konfirmasi Pembayaran')
@section('content')
    <form action="{{ route('pembayarans.updateStatus', $sewa->id) }}" method="POST">
        @csrf
        <div class="card p-4">
            <h5>Data Sewa</h5>
            <p>Penyewa: {{ $sewa->user->name }}</p>
            <p>Loker: {{ $sewa->loker->kode_loker }}</p>
            <p>Total Tagihan: Rp {{ number_format($sewa->total_harga, 0, ',', '.') }}</p>
            <hr>
            <div class="mb-3">
                <label>Metode Pembayaran</label>
                <select name="metode_bayar" class="form-select">
                    <option value="cash">Cash</option>
                    <option value="transfer">Transfer</option>
                    <option value="qris">QRIS</option>
                </select>
            </div>
            <button class="btn btn-success">Konfirmasi Pembayaran</button>
            <a href="{{ route('pembayarans.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </form>
@endsection
