<div id="app">
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                    <div class="login-brand">
                        <img src="<?= base_url() ?>/template/stisla/assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
                    </div>

                    <div class="card card-primary neu-brutalism">
                        <div class="card-header">
                            <h4><?= $title; ?></h4>
                        </div>

                        <?= $this->session->flashdata('message') ?>

                        <div class="card-body">
                            <form method="POST" action="<?= base_url('auth'); ?>" class="needs-validation">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <?= form_error('email', '<br /><small class="text-danger">', '</small>') ?>
                                    <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                                </div>

                                <div class="form-group">
                                    <div class="d-block">
                                        <label for="password" class="control-label">Kata Sandi</label>
                                    </div>
                                    <?= form_error('password', '<br /><small class="text-danger">', '</small>') ?>
                                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block neu-brutalism" tabindex="4">
                                        Masuk
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>
                    <div class="mt-5 text-muted text-center simple-footer">
                        Belum mempunyai akun? <a href="<?= base_url() ?>auth/daftar">Daftar</a>
                    </div>
                    <!-- <div class="simple-footer">
                        Copyright &copy; Beasiswa STMIK Bandung 2023
                    </div> -->
                </div>
            </div>
        </div>
    </section>
</div>