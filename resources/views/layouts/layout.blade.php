<!DOCTYPE html>
<html>
<head>
    <title>Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color:#9dbad5;">

<nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#007bff;">
    <div class="container-fluid">

        <a class="navbar-brand" href="/home">Laravel</a>

        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a class="nav-link" href="/siswa">Siswa</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/kelas">Kelas</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/jenis">Jenis Pelanggaran</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/pelanggaran">Pelanggaran</a>
                </li>

                <!-- Tombol Logout -->
                @auth
                <li class="nav-item ms-3">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="btn btn-warning">Logout</button>
                    </form>
                </li>
                @endauth

            </ul>
        </div>

    </div>
</nav>


<div class="container mt-4">
    @yield('content')
</div>

</body>
</html>
