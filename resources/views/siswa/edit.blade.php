@extends('layouts.app')

@section('title', 'Edit Data Siswa')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header bg-warning text-white">
            <h5 class="mb-0">Edit Data Siswa</h5>
        </div>
        <div class="card-body">
    <form action="{{ route('siswa.update', $siswa->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label>Nis</label>
            <input type="text" name="nis" class="form-control" value="{{ $siswa->nis }}">
        </div>
        <div class="mb-4">  
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ $siswa->nama }}">
        </div>
        <div class="mb-3">
            <label>Kelamin</label>
            <select name="jenis_kelamin" class="form-control" required>
                <option value="L" {{ $siswa->kelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>
                <option value="P" {{ $siswa->kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>
        <div class="mb-4">
            <label>Agama</label>
            <input type="text" name="agama" class="form-control" value="{{ $siswa->agama }}">
        </div>
        <div class="mb-4">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control" value="{{ $siswa->alamat }}">
        </div>

        {{-- Gambar Saat Ini --}}
    <div class="form-group mb-2">
        <label>Gambar Saat Ini</label><br>
        @if($siswa->gambar)
            <img src="{{ asset('gambar_siswa/'.$siswa->gambar) }}" width="100">
        @else
            Tidak ada gambar
        @endif
    </div>

    {{-- Upload Gambar Baru --}}
    <div class="form-group mb-2">
        <label>Ganti Gambar (Opsional)</label><br>
        <img src="{{ asset('storage/' . $siswa->foto) }}" alt="Foto">
        <input type="file" name="gambar">
    </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('siswa.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
        </div>
    </div>
@endsection