@extends('layouts.app')

@section('title', 'Tambah Data Siswa')

@section('content')
    <div class="card shadow=sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Tambah Data Siswa</h5>
        </div>
        <div class="card-body">
    <form action="{{ route('siswa.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label>Nis</label>
            <input type="text" name="nis" class="form-control">
        </div>
        <div class="mb-4">  
            <label>Nama</label>
            <input type="text" name="nama" class="form-control">
        </div>
        <div class="mb-4">
                <label>Kelamin</label>
                <select name="jenis_kelamin" class="form-control" required>

                <option value="">-- Pilih --</option>
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
                </select>
        </div>
        <div class="mb-4">
            <label>Agama</label>
            <input type="text" name="agama" class="form-control">
        </div>
        <div class="mb-4">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control"></textarea>
        </div>
        <div class="mb-4">
            <label>Foto</label>
            <input type="file" name="foto" class="form-control">    
        </div>
        
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('siswa.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
        </div>
    </div>
@endsection