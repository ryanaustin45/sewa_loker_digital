@extends('layouts.admin')
@section('title', 'Edit User')
@section('content')
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
        </div>
        <div class="mb-3">
            <label>No Hp</label>
            <input type="text" name="no_hp" class="form-control" value="{{ $user->no_hp }}" required>
        </div>
        <div class="mb-3">
            <label>NIK</label>
            <input type="text" name="NIK" class="form-control" value="{{ $user->NIK }}" required>
        </div>
        <div class="mb-3">
            <label>Password (kosongkan jika tidak diubah)</label>
            <input type="password" name="password" class="form-control">
        </div>
        @if (Auth::user()->role == 'admin')
            <div class="mb-3">
                <label>Role</label>
                <select name="role" class="form-select">
                    <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                </select>
            </div>
        @else
            <input type="hidden" name="role" value="{{ $user->role ?? 'user' }}">
        @endif
        <button class="btn btn-primary">Update</button>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
@endsection
