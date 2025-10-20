@extends('layouts.admin')
@section('title', 'Edit Loker')
@section('content')
    <form action="{{ route('lokers.update', $loker->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Lokasi</label>
            <input type="text" name="lokasi" value="{{ $loker->lokasi }}" class="form-control">
        </div>
        <div class="mb-3">
            <label>Harga per Hari</label>
            <input type="number" name="harga_per_hari" step="0.01" value="{{ $loker->harga_per_hari }}"
                class="form-control">
        </div>
        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-select">
                <option value="tersedia" {{ $loker->status == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                <option value="disewa" {{ $loker->status == 'disewa' ? 'selected' : '' }}>Disewa</option>
                <option value="nonaktif" {{ $loker->status == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Ukuran</label>
            <select name="ukuran" class="form-select">
                <option value="kecil" {{ $loker->ukuran == 'tersedia' ? 'selected' : '' }}>Kecil</option>
                <option value="besar" {{ $loker->ukuran == 'tersedia' ? 'selected' : '' }}>Besar</option>
            </select>
        </div>
        <button class="btn btn-primary">Update</button>
        <a href="{{ route('lokers.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
@endsection
