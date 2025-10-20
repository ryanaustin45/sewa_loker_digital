@extends('layouts.admin')
@section('title', 'Sewa Loker Baru')
@section('content')
    <form action="{{ route('sewa.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Loker</label>
            <select name="loker_id" class="form-select" required>
                <option value="">-- Pilih Loker --</option>
                @foreach ($lokers as $l)
                    <option value="{{ $l->id }}">{{ $l->kode_loker }} - Rp
                        {{ number_format($l->harga_per_hari, 0, ',', '.') }}/hari</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Tanggal Mulai</label>
            <input type="date" name="tanggal_mulai" class="form-control" required>
        </div>
        {{-- <div class="mb-3">
            <label>Tanggal Akhir</label>
            <input type="date" name="tanggal_akhir" class="form-control" required>
        </div> --}}
        <button class="btn btn-success">Sewa Sekarang</button>
        <a href="{{ route('sewa.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
@endsection
