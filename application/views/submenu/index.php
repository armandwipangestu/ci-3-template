<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header neu-brutalism-border">
            <h1><?= $title; ?></h1>
        </div>

        <?= $this->session->flashdata('message') ?>
        <?= form_error('title', '<div class="alert alert-danger neu-brutalism mb-4">', '</div>') ?>
        <?= form_error('menu_id', '<div class="alert alert-danger neu-brutalism mb-4">', '</div>') ?>
        <?= form_error('url', '<div class="alert alert-danger neu-brutalism mb-4">', '</div>') ?>
        <?= form_error('icon', '<div class="alert alert-danger neu-brutalism mb-4">', '</div>') ?>


        <a href="#" data-toggle="modal" data-target="#modalSubmenuBaru" class="btn btn-icon icon-left btn-primary mb-4 neu-brutalism"><i class="fas fa-plus"></i> Tambah Submenu Baru</a>

        <div class="table-responsive rounded">
            <table class="table table-hover table-bordered neu-brutalism-border display" id="myTable">
                <thead>
                    <tr>
                        <th scope="col" class="text-dark">#</th>
                        <th scope="col" class="text-dark">Title</th>
                        <th scope="col" class="text-dark">Menu</th>
                        <th scope="col" class="text-dark">Url</th>
                        <th scope="col" class="text-dark">Icon</th>
                        <th scope="col" class="text-dark">Aksi</th>

                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    <?php foreach ($subMenu as $sm) : ?>
                        <tr>
                            <th scope="row"><?= $i ?></th>
                            <td><?= $sm['title'] ?></td>
                            <td><?= $sm['menu'] ?></td>
                            <td><?= $sm['url'] ?></td>
                            <td><?= $sm['icon'] ?></td>
                            <td>
                                <a href="#" onclick="ubah('<?= $sm['id'] ?>')" class="btn btn-warning mr-2 neu-brutalism"><i class="fas fa-edit"></i> Ubah</a>
                                <a class="btn btn-danger neu-brutalism hapus" data-id="<?= $sm['id'] ?>" data-url="<?= base_url('submenu/hapus') ?>" data-submenu="<?= $sm['title'] ?>"><i class="fas fa-trash"></i> Hapus</a>
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

<!-- Modal -->
<div class="modal fade" id="modalSubmenuBaru" tabindex="-1" role="dialog" aria-labelledby="modalSubmenuBaruLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content neu-brutalism-border">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="newModalSubmenuBaru">Tambah Submenu Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('submenu') ?>" method="POST">

                <div class="modal-body">
                    <div class="form-group">
                        <label for="title" class="form-label">Nama Submenu</label>
                        <input type="text" class="form-control" id="title" name="title" value="<?= set_value('title') ?>">
                    </div>

                    <div class="form-group">
                        <label for="menu" class="form-label">Menu</label>
                        <select name="menu_id" id="menu_id" class="form-control">
                            <option value="">Pilih Menu</option>
                            <?php foreach ($menu as $m) : ?>
                                <option value="<?= $m['id'] ?>"><?= $m['menu'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="url" class="form-label">Alamat Url</label>
                        <input type="text" class="form-control" id="url" name="url" value="<?= set_value('url') ?>">
                    </div>

                    <div class="form-group">
                        <label for="icon" class="form-label">Nama Icon</label>
                        <input type="text" class="form-control" id="icon" name="icon" value="<?= set_value('icon') ?>">
                    </div>
                </div>


                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary neu-brutalism" id="submit"><i class="fas fa-plus"></i> Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalSubmenuUbah" tabindex="-1" role="dialog" aria-labelledby="modalSubmenuUbahLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content neu-brutalism-border">
            <div class="modal-header">
                <h5 class="modal-title modal-ubah text-dark" id="newModalSubmenuUbah">Ubah Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('submenu/ubah') ?>" method="POST">
                <input type="hidden" class="form-control" id="idUbah" name="id">

                <div class="modal-body">
                    <div class="form-group">
                        <label for="title" class="form-label">Nama Submenu</label>
                        <input type="text" class="form-control" id="titleUbah" name="title" value="<?= set_value('title') ?>">
                    </div>

                    <div class="form-group">
                        <label for="menu" class="form-label">Menu</label>
                        <select name="menu_id" id="menu_id_ubah" class="form-control">
                            <option id="pilih_menu" value=""></option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="url" class="form-label">Alamat Url</label>
                        <input type="text" class="form-control" id="urlUbah" name="url" value="<?= set_value('url') ?>">
                    </div>

                    <div class="form-group">
                        <label for="icon" class="form-label">Nama Icon</label>
                        <input type="text" class="form-control" id="iconUbah" name="icon" value="<?= set_value('icon') ?>">
                    </div>
                </div>


                <div class="modal-footer">
                    <button type="submit" class="btn btn-warning neu-brutalism" id="submit"><i class="fas fa-edit"></i> Ubah</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    const baseUrl = `<?= base_url() ?>`

    const ubah = (id) => {
        $.get(`${baseUrl}submenu/get_submenu/${id}`, (data) => {
            const menu = $.parseJSON(data);

            $('.modal-ubah').text('Ubah Menu');
            $('#idUbah').val(menu.id);
            $('#titleUbah').val(menu.title);
            $('#pilih_menu').val(menu.menu_id);
            $('#pilih_menu').text(menu.menu);
            $('#urlUbah').val(menu.url);
            $('#iconUbah').val(menu.icon);
            $('#menuUbah').val(menu.menu);

            const menuIdUbah = document.querySelector('#menu_id_ubah');

            // Menghapus opsi sebelum menambahkan yang baru
            const options = Array.from(menuIdUbah.options);
            options.forEach((option) => {
                if (option.id !== 'pilih_menu') {
                    menuIdUbah.removeChild(option);
                }
            });

            menu.menus.map((m) => {
                if (menu.menu_id !== m.id) {
                    const opt = document.createElement('option')
                    opt.value = m.id
                    opt.innerHTML = m.menu
                    menuIdUbah.appendChild(opt)
                }
            })

            $('#modalSubmenuUbah').modal('show');
        })
    }

    const hapusSubmenu = document.querySelectorAll('.hapus')
    hapusSubmenu.forEach((hsm) => {
        hsm.addEventListener('click', () => {
            const dataId = hsm.dataset.id
            const dataUrl = hsm.dataset.url
            const dataSubmenu = hsm.dataset.submenu
            Swal.fire({
                icon: 'warning',
                html: `Apakah anda yakin ingin menghapus Submenu <b>${dataSubmenu}</b>?`,
                showCancelButton: true,
                confirmButtonColor: '#d9534f',
                cancelButtonColor: '#5cb85c',
                confirmButtonText: `Ya`,
                cancelButtonText: `Tidak`,
            }).then((result) => {
                if (result.isConfirmed) {
                    location.href = `${dataUrl}/${dataId}`
                }
            })
        })
    })
</script>