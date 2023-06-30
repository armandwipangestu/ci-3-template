<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header neu-brutalism-border">
            <h1><?= $title; ?></h1>
        </div>

        <?= $this->session->flashdata('message') ?>

        <div class="card mb-3 neu-brutalism p-3 p-md-4" style="max-width: 540px;">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="<?= base_url('assets/img/profile/') . $user['image'] ?>" class="card-img">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title"><?= $user['nama'] ?></h5>
                        <p class="card-text"><?= $user['email'] ?></p>
                        <p class="card-text"><small class="text-muted">Bergabung dari <?= $tanggal_bergabung ?></small></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>