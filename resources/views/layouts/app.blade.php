<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #a2bfdd;
        }
        .navbar-brand {
            font-weight: bold;
        }
    </style>
</head>
<body>

    {{-- NAVBAR --}}
    <nav class="navbar navbar-expand-md navbar-dark bg-primary">
        <div class="container">

            <!-- Brand -->
            <a class="navbar-brand" href="#">
                {{ config('app.name', 'Laravel') }}
            </a>

            <!-- Toggler -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Menu -->
            <div class="collapse navbar-collapse" id="navbarMenu">
                <ul class="navbar-nav ms-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('siswa.index') }}">Siswa</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('jenis.index') }}">Jenis Pelanggaran</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('kelas.index') }}">Kelas</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('pelanggaran.index') }}">Pelanggaran</a>
                    </li>

                    {{-- Logout --}}
                    <li class="nav-item ms-2">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-warning btn-sm">
                                Logout
                            </button>
                        </form>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    {{-- ALERT NOTIFICATION --}}
    <div class="container mt-3">

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

    </div>

    {{-- MAIN CONTENT --}}
    <main class="py-4">
        <div class="container">
            @yield('content')
        </div>
    </main>

    <!-- Bootstrap Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
