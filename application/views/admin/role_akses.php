<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header neu-brutalism-border">
            <h1><?= $title; ?></h1>
        </div>

        <!-- URL -->
        <!-- <div class="d-flex">
            <div class=""></div>
            <div class="ml-auto">
                <?php $url = ''; ?>
                <?php foreach ($segments as $segment) : ?>
                    <?php $url .= '/' . $segment; ?>
                    / <a href="<?= base_url($url); ?>"><?= $segment; ?></a>
                <?php endforeach; ?>
            </div>
        </div> -->

        <?= $this->session->flashdata('message') ?>
        <div class="d-flex">
            <div class="p-2">
                <a href="<?= base_url('admin/role'); ?>" class="btn btn-icon icon-left btn-primary mb-4 neu-brutalism"><i class="fas fa-arrow-left"></i> Kembali</a>
            </div>
            <div class="ml-auto p-2">
                <a href="#" class="btn btn-icon icon-left btn-warning mb-4 neu-brutalism"> Role dipilih: <b><?= $role['role']; ?></b></a>
            </div>
        </div>

        <div class="table-responsive rounded">
            <table class="table table-hover table-bordered neu-brutalism-border">
                <thead>
                    <tr>
                        <th scope="col" class="text-dark">#</th>
                        <th scope="col" class="text-dark">Menu</th>
                        <th scope="col" class="text-dark">Akses</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    <?php foreach ($menu as $m) : ?>
                        <tr>
                            <th scope="row"><?= $i ?></th>
                            <td><?= $m['menu'] ?></td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" <?= cek_akses($role['id'], $m['id']); ?> data-role="<?= $role['id']; ?>" data-menu="<?= $m['id']; ?>">
                                </div>
                            </td>
                        </tr>
                        <?php $i++ ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
</div>
</section>
</div>