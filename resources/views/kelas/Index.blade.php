@extends('layouts.app')

@section('title', 'Data Kelas')

@section('content')
<div class="container mt-3">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="fw-bold">Data Kelas</h2>

        <div>
            <a href="{{ route('kelas.create') }}" class="btn btn-primary btn-sm">+ Tambah Kelas</a>
            <a href="/home" class="btn btn-secondary btn-sm">Kembali</a>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">

            <table class="table table-bordered table-striped align-middle">
                <thead class="table-primary">
                    <tr>
                        <th>Kelas</th>
                        <th>Wali Kelas</th>
                        <th>Keterangan</th>
                        <th style="width: 160px;">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($kelas as $item)
                    <tr>
                        <td>{{ $item->kelas }}</td>
                        <td>{{ $item->wali_kelas }}</td>
                        <td>{{ $item->keterangan }}</td>

                        <td>
                            <a href="{{ route('kelas.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <form action="{{ route('kelas.destroy', $item->id) }}" method="POST" class="d-inline">
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

                    @if($kelas->isEmpty())
                    <tr>
                        <td colspan="4" class="text-center text-muted">
                            Belum ada data kelas.
                        </td>
                    </tr>
                    @endif
                </tbody>
            </table>

        </div>
    </div>

</div>
@endsection
