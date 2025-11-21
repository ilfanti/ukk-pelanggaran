@extends('layouts.app')

@section('title', 'Data Pelanggaran')

@section('content')
<div class="container mt-3">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="fw-bold">Data Pelanggaran</h2>

        <div>
            <a href="{{ route('pelanggaran.create') }}" class="btn btn-primary btn-sm">+ Tambah Pelanggaran</a>
            <a href="/home" class="btn btn-secondary btn-sm">Kembali</a>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">

            <table class="table table-bordered table-striped align-middle">
                <thead class="table-primary">
                    <tr>
                        <th style="width: 150px;">Foto</th>
                        <th style="width: 200px;">Tanggal</th>
                        <th style="width: 180px;">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($pelanggaran as $p)
                    <tr>
                        <td>
                            @if($p->foto)
                                <img src="{{ asset('storage/' . $p->foto) }}" class="img-fluid rounded" width="140">
                            @else
                                <span class="text-muted">Tidak ada foto</span>
                            @endif
                        </td>

                        <td>{{ $p->tanggal }}</td>

                        <td>
                            <a href="{{ route('pelanggaran.edit', $p->id) }}" class="btn btn-warning btn-sm">Edit</a>

                            <form action="{{ route('pelanggaran.destroy', $p->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                    @if($pelanggaran->isEmpty())
                    <tr>
                        <td colspan="3" class="text-center text-muted">Belum ada data pelanggaran.</td>
                    </tr>
                    @endif
                </tbody>
            </table>

        </div>
    </div>

</div>
@endsection
