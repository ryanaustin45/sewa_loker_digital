<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Sewa Loker')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            min-height: 100vh;
            background: #f7f8fa;
        }

        .sidebar {
            width: 230px;
            background: #212529;
            color: white;
        }

        .sidebar a {
            color: #adb5bd;
            text-decoration: none;
            display: block;
            padding: 10px 20px;
        }

        .sidebar a:hover,
        .sidebar .active {
            background: #495057;
            color: #fff;
        }

        .content {
            flex: 1;
            padding: 20px;
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <h5 class="text-center py-3 border-bottom">SEWA LOKER DIGITAL</h5>
        <a href="{{ route('dashboard') }}">Dashboard</a>
        @if (Auth::user()->role == 'admin')
            <a href="{{ route('users.index') }}">Kelola User</a>
            <a href="{{ route('lokers.index') }}">Data Loker</a>
            {{-- <a href="{{ route('pembayarans.index') }}">Pembayaran</a> --}}
        @endif
        @if (Auth::user()->role == 'user')
            <a href="{{ route('users.edit', Auth::user()->id) }}">Edit User</a>
            <a href="{{ route('sewa.index') }}">Daftar Sewa</a>
        @endif
        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Logout</a>
        <form id="logout-form" method="POST" action="{{ route('logout') }}" class="d-none">@csrf</form>
    </div>
    <div class="content">
        <h4>@yield('title')</h4>
        <hr>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @yield('content')
    </div>
</body>

</html>
