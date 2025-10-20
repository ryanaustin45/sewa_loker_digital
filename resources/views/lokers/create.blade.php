@extends('layouts.admin')
@section('title', 'Tambah Loker')
@section('content')
    <form action="{{ route('lokers.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Kode Loker</label>
            <input type="text" name="kode_loker" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Lokasi</label>
            <input type="text" name="lokasi" class="form-control">
        </div>
        <div class="mb-3">
            <label>Harga per Hari</label>
            <input type="number" name="harga_per_hari" class="form-control" step="0.01" required>
        </div>
        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-select">
                <option value="tersedia">tersedia</option>
                <option value="disewa">disewa</option>
                <option value="nonaktif">nonaktif</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Ukuran</label>
            <select name="ukuran" class="form-select">
                <option value="kecil">kecil</option>
                <option value="besar">besar</option>
            </select>
        </div>
        <button class="btn btn-success">Simpan</button>
        <a href="{{ route('lokers.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
@endsection
