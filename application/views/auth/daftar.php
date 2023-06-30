  <div id="app">
      <section class="section">
          <div class="container mt-5">
              <div class="row">
                  <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                      <div class="login-brand">
                          <img src="<?= base_url() ?>/template/stisla/assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
                      </div>

                      <div class="card card-primary neu-brutalism">
                          <div class="card-header">
                              <h4><?= $title; ?></h4>
                          </div>

                          <div class="card-body">
                              <form method="POST" action="<?= base_url('auth/daftar'); ?>">
                                  <div class="form-group">
                                      <label for="nama">Nama</label>
                                      <?= form_error('nama', '<small class="text-danger">', '</small>') ?>
                                      <input id="nama" type="nama" class="form-control" name="nama" value="<?= set_value('nama') ?>">
                                  </div>

                                  <div class="form-group">
                                      <label for="email">Email</label>
                                      <?= form_error('email', '<small class="text-danger">', '</small>') ?>
                                      <input id="email" type="email" class="form-control" name="email" value="<?= set_value('email') ?>">
                                  </div>

                                  <div class="row">
                                      <div class="form-group col-md-6">
                                          <label for="password" class="">Kata Sandi</label>
                                          <?= form_error('password', '<small class="text-danger">', '</small>') ?>
                                          <input id="password" type="password" class="form-control" name="password">
                                      </div>
                                      <div class="form-group col-md-6">
                                          <label for="password2" class="">Konfirmasi Kata Sandi</label>
                                          <?= form_error('password2', '<small class="text-danger">', '</small>') ?>
                                          <input id="password2" type="password" class="form-control" name="password2">
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <button type="submit" class="btn btn-primary btn-lg btn-block neu-brutalism">
                                          Daftar
                                      </button>
                                  </div>
                              </form>
                          </div>
                      </div>
                      <div class="mt-5 text-muted text-center simple-footer">
                          Sudah mempunyai akun? <a href="<?= base_url() ?>auth">Masuk</a>
                      </div>
                      <!-- <div class="simple-footer">
                          Copyright &copy; Beasiswa STMIK Bandung 2023
                      </div> -->
                  </div>
              </div>
          </div>
      </section>
  </div>