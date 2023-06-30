<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header neu-brutalism-border">
            <h1><?= $title; ?></h1>
        </div>

        <?= $this->session->flashdata('message') ?>

        <div class="card card-primary neu-brutalism">

            <div class="card-body">
                <form action="<?= base_url('user/ganti_kata_sandi'); ?>" method="POST">
                    <div class="form-group">
                        <label for="current_password">Kata Sandi</label>
                        <?= form_error('current_password', '<small class="text-danger">', '</small>') ?>
                        <input id="current_password" type="password" class="form-control" name="current_password">
                    </div>

                    <div class="form-group">
                        <label for="password1">Kata Sandi Baru</label>
                        <?= form_error('password1', '<small class="text-danger">', '</small>') ?>
                        <input id="password1" type="password" class="form-control" name="password1">
                    </div>

                    <div class="form-group">
                        <label for="password2">Konfirmasi Kata Sandi Baru</label>
                        <?= form_error('password2', '<small class="text-danger">', '</small>') ?>
                        <input id="password2" type="password" class="form-control" name="password2">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block neu-brutalism">
                            Ganti Kata Sandi
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </section>
</div>