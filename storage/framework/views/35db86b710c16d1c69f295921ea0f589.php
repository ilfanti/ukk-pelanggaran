

<?php $__env->startSection('title', 'Data Siswa'); ?>

<?php $__env->startSection('content'); ?>
<div class="container mt-3">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="fw-bold">Data Siswa</h2>

        <div>
            <a href="<?php echo e(route('siswa.create')); ?>" class="btn btn-primary btn-sm">+ Tambah Siswa</a>
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
                    <?php $__currentLoopData = $siswa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($item->nis); ?></td>
                        <td><?php echo e($item->nama); ?></td>
                        <td><?php echo e($item->jenis_kelamin); ?></td>
                        <td><?php echo e($item->agama); ?></td>
                        <td><?php echo e($item->alamat); ?></td>

                        <td>
                            <?php if($item->foto): ?>
                                <img src="<?php echo e(asset('storage/' . $item->foto)); ?>" width="80" class="rounded">
                            <?php else: ?>
                                <span class="text-muted">Tidak ada foto</span>
                            <?php endif; ?>
                        </td>

                        <td>
                            <a href="<?php echo e(route('siswa.edit', $item->id)); ?>" class="btn btn-warning btn-sm mb-1">
                                Edit
                            </a>

                            <form action="<?php echo e(route('siswa.destroy', $item->id)); ?>" method="POST" class="d-inline">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button 
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin ingin menghapus data siswa ini?')"
                                >
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <?php if($siswa->isEmpty()): ?>
                    <tr>
                        <td colspan="7" class="text-center text-muted">Belum ada data siswa.</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>

        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\ukk\pelanggaran_siswa\resources\views/siswa/index.blade.php ENDPATH**/ ?>