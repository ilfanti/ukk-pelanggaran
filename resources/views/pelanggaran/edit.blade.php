<form action="{{ route('pelanggaran.update', $pelanggaran->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Foto Saat Ini</label><br>
        @if($pelanggaran->foto)
            <img src="{{ asset('storage/' . $pelanggaran->foto) }}" width="120">
        @else
            Tidak ada foto
        @endif
    </div>

    <div class="mb-3">
        <label>Ganti Foto (Opsional)</label>
        <input type="file" name="foto" class="form-control">
    </div>

    <div class="mb-3">
        <label>Tanggal</label>
        <input type="datetime-local"
               name="tanggal"
               value="{{ date('Y-m-d\TH:i', strtotime($pelanggaran->tanggal)) }}"
               required
               class="form-control">
    </div>

    <button class="btn btn-success">Update</button>
</form>
