@extends('layouts.app')

@section('title', 'Jenis Pelanggaran')

@section('content')
<div class="container mt-3">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="fw-bold">Jenis Pelanggaran</h2>

        <div>
            <a href="{{ route('jenis.create') }}" class="btn btn-primary btn-sm">+ Tambah Jenis</a>
            <a href="/home" class="btn btn-secondary btn-sm">Kembali</a>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">

            <table class="table table-bordered table-striped align-middle">
                <thead class="table-primary">
                    <tr>
                        <th>Jenis</th>
                        <th>Keterangan</th>
                        <th>Poin</th>
                        <th style="width: 160px;">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($jenis as $item)
                    <tr>
                        <td>{{ $item->jenis }}</td>
                        <td>{{ $item->keterangan }}</td>
                        <td>{{ $item->poin }}</td>

                        <td>
                            <a href="{{ route('jenis.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <form action="{{ route('jenis.destroy', $item->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button 
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin ingin menghapus data ini?')"
                                >
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                    @if($jenis->isEmpty())
                    <tr>
                        <td colspan="4" class="text-center text-muted">
                            Belum ada data jenis pelanggaran.
                        </td>
                    </tr>
                    @endif
                </tbody>
            </table>

        </div>
    </div>

</div>
@endsection
