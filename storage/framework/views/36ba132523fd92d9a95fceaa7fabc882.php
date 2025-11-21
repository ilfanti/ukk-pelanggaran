<form action="<?php echo e(route('pelanggaran.store')); ?>" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>

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
<?php /**PATH C:\xampp\htdocs\ukk\pelanggaran_siswa\resources\views/pelanggaran/create.blade.php ENDPATH**/ ?>