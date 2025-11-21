@extends('layouts.app')

@section('title', 'Tambah Jenis')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">Tambah Data Jenis</h5>
    </div>
    <div class="card-body">

        <form action="{{ route('jenis.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Jenis</label>
                <input type="text" name="jenis" class="form-control" value="{{ old('jenis') }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Keterangan</label>
                <input type="text" name="keterangan" class="form-control" value="{{ old('keterangan') }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Poin</label>
                <input type="number" name="poin" class="form-control" value="{{ old('poin') }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('jenis.index') }}" class="btn btn-secondary">Kembali</a>
        </form>

    </div>
</div>
@endsection
