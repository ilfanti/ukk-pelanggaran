@extends('layouts.app')

@section('title', 'Edit Jenis')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-warning text-dark">
        <h5 class="mb-0">Edit Data Jenis</h5>
    </div>
    <div class="card-body">

        <form action="{{ route('jenis.update', $jenis->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Jenis</label>
                <input type="text" name="jenis" class="form-control" value="{{ old('jenis', $jenis->jenis) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Keterangan</label>
                <input type="text" name="keterangan" class="form-control" value="{{ old('keterangan', $jenis->keterangan) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Poin</label>
                <input type="number" name="poin" class="form-control" value="{{ old('poin', $jenis->poin) }}" required>
            </div>

            <button type="submit" class="btn btn-warning text-dark">Update</button>
            <a href="{{ route('jenis.index') }}" class="btn btn-secondary">Kembali</a>
        </form>

    </div>
</div>
@endsection
