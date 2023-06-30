<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header neu-brutalism-border">
            <h1><?= $title; ?></h1>
        </div>

        <div class="card card-primary neu-brutalism">

            <?= $this->session->flashdata('message') ?>

            <div class="card-body">
                <?= form_open_multipart('user/ubah'); ?>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-7 p-0 p-md-3">

                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <?= form_error('nama', '<small class="text-danger">', '</small>') ?>
                                <input id="nama" type="nama" class="form-control" name="nama" value="<?= $user['nama']; ?>">
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control" name="email" value="<?= $user['email']; ?>" readonly>
                            </div>
                        </div>

                        <div class="col-md-5 p-0 p-md-3">

                            <div class="form-group row">
                                <div class="col-sm-4">Gambar</div>
                                <div class="col-sm-11">
                                    <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-thumbnail img-preview">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input gambar-preview" id="image" name="image" onchange="previewImage()">
                                        <label for="image" class="custom-file-label">Pilih File</label>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block neu-brutalism">
                            Ubah
                        </button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </section>
</div>