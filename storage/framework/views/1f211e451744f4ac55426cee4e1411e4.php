

<?php $__env->startSection('title', 'Jenis Pelanggaran'); ?>

<?php $__env->startSection('content'); ?>
<div class="container mt-3">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="fw-bold">Jenis Pelanggaran</h2>

        <div>
            <a href="<?php echo e(route('jenis.create')); ?>" class="btn btn-primary btn-sm">+ Tambah Jenis</a>
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
                    <?php $__currentLoopData = $jenis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($item->jenis); ?></td>
                        <td><?php echo e($item->keterangan); ?></td>
                        <td><?php echo e($item->poin); ?></td>

                        <td>
                            <a href="<?php echo e(route('jenis.edit', $item->id)); ?>" class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <form action="<?php echo e(route('jenis.destroy', $item->id)); ?>" method="POST" class="d-inline">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button 
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin ingin menghapus data ini?')"
                                >
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <?php if($jenis->isEmpty()): ?>
                    <tr>
                        <td colspan="4" class="text-center text-muted">
                            Belum ada data jenis pelanggaran.
                        </td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>

        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\ukk\pelanggaran_siswa\resources\views/jenis/index.blade.php ENDPATH**/ ?>