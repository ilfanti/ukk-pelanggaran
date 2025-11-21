@extends('layouts.app')

@section('title', 'Registrasi')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="min-height: 90vh;">
    <div class="card shadow-lg" style="width: 450px; border-radius: 15px;">
        <div class="card-header text-center bg-primary text-white" style="border-radius: 15px 15px 0 0;">
            <h4 class="m-0">Registrasi Akun</h4>
        </div>

        <div class="card-body">

            <form action="{{ route('register.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="fw-bold">Nama</label>
                    <input type="text" name="nama" class="form-control form-control-lg" placeholder="Masukkan nama" required>
                </div>

                <div class="mb-3">
                    <label class="fw-bold">Username</label>
                    <input type="text" name="username" class="form-control form-control-lg" placeholder="Masukkan username" required>
                </div>

                <div class="mb-3">
                    <label class="fw-bold">Password</label>
                    <input type="password" name="password" class="form-control form-control-lg" placeholder="Masukkan password" required>
                </div>

                <div class="mb-3">
                    <label class="fw-bold">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" class="form-control form-control-lg" placeholder="Ulangi password" required>
                </div>

                <div class="mb-3">
                    <label class="fw-bold">Jenis Kelamin</label>
                    <select name="kelamin" class="form-control form-control-lg" required>
                        <option disabled selected>Pilih jenis kelamin</option>
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="fw-bold">Alamat</label>
                    <input type="text" name="alamat" class="form-control form-control-lg" placeholder="Masukkan alamat" required>
                </div>

                <div class="mb-3">
                    <label class="fw-bold">Level</label>
                    <select name="level" class="form-control form-control-lg" required>
                        <option disabled selected>Pilih level pengguna</option>
                        <option value="admin">Admin</option>
                        <option value="siswa">Siswa</option>
                    </select>
                </div>

                <div class="d-grid gap-2">
                    <button class="btn btn-primary btn-lg">Daftar</button>
                    <a href="{{ route('login') }}" class="btn btn-secondary btn-lg">Kembali</a>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
