@extends('layouts.app')

@section('title', 'Data Siswa')

@section('content')
<div class="container mt-3">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="fw-bold">Data Siswa</h2>

        <div>
            <a href="{{ route('siswa.create') }}" class="btn btn-primary btn-sm">+ Tambah Siswa</a>
            <a href="/home" class="btn btn-secondary btn-sm">Kembali</a>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">

            <table class="table table-bordered table-striped align-middle">
                <thead class="table-primary">
                    <tr>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Agama</th>
                        <th>Alamat</th>
                        <th>Foto</th>
                        <th style="width: 160px;">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($siswa as $item)
                    <tr>
                        <td>{{ $item->nis }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->jenis_kelamin }}</td>
                        <td>{{ $item->agama }}</td>
                        <td>{{ $item->alamat }}</td>

                        <td>
                            @if($item->foto)
                                <img src="{{ asset('storage/' . $item->foto) }}" width="80" class="rounded">
                            @else
                                <span class="text-muted">Tidak ada foto</span>
                            @endif
                        </td>

                        <td>
                            <a href="{{ route('siswa.edit', $item->id) }}" class="btn btn-warning btn-sm mb-1">
                                Edit
                            </a>

                            <form action="{{ route('siswa.destroy', $item->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button 
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin ingin menghapus data siswa ini?')"
                                >
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                    @if($siswa->isEmpty())
                    <tr>
                        <td colspan="7" class="text-center text-muted">Belum ada data siswa.</td>
                    </tr>
                    @endif
                </tbody>
            </table>

        </div>
    </div>

</div>
@endsection
