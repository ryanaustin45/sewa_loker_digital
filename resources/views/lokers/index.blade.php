@extends('layouts.admin')
@section('title', 'Data Loker')
@section('content')
    <a href="{{ route('lokers.create') }}" class="btn btn-primary mb-3">+ Tambah Loker</a>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Kode</th>
                <th>Lokasi</th>
                <th>Ukuran</th>
                <th>Harga / Hari</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($lokers as $loker)
                <tr>
                    <td>{{ $loker->kode_loker }}</td>
                    <td>{{ $loker->lokasi }}</td>
                    <td>{{ $loker->ukuran }}</td>
                    <td>Rp {{ number_format($loker->harga_per_hari, 0, ',', '.') }}</td>
                    <td>
                        <span
                            class="badge bg-{{ $loker->status == 'tersedia' ? 'success' : ($loker->status == 'disewa' ? 'warning' : 'secondary') }}">
                            {{ ucfirst($loker->status) }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('lokers.edit', $loker->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('lokers.destroy', $loker->id) }}" method="POST" style="display:inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
