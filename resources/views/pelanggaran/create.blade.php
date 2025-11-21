<form action="{{ route('pelanggaran.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label>Foto</label>
        <input type="file" name="foto" class="form-control">
    </div>

    <div class="mb-3">
        <label>Tanggal</label>
        <input type="datetime-local" name="tanggal" class="form-control" required>
    </div>

    <button class="btn btn-primary">Simpan</button>
</form>
