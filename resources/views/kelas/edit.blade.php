@extends('layouts.app')

@section('title', 'Data Kelas')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header bg-warning text-white">
            <h5 class="mb-0">Edit Kelas</h5>
        </div>
        <div class="card-body">
    <form action="{{ route('kelas.update', $kelas->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label>Kelas</label>
            <input type="text" name="kelas" class="form-control">
        </div>
        <div class="mb-4">  
            <label>Wali Kelas</label>
            <input type="text" name="wali_kelas" class="form-control">
        </div>
        <div class="mb-4">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('kelas.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
        </div>
    </div>
@endsection