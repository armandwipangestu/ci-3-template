<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header neu-brutalism-border">
            <h1><?= $title; ?></h1>
        </div>

        <?= $this->session->flashdata('message') ?>
        <?= form_error('role', '<div class="alert alert-danger neu-brutalism mb-4">', '</div>') ?>

        <a href="#" data-toggle="modal" data-target="#modalRoleBaru" class="btn btn-icon icon-left btn-primary mb-4 neu-brutalism"><i class="fas fa-plus"></i> Tambah Role Baru</a>

        <div class="table-responsive rounded">
            <table class="table table-hover table-bordered neu-brutalism-border display" id="myTable">
                <thead>
                    <tr>
                        <th scope="col" class="text-dark">#</th>
                        <th scope="col" class="text-dark">Role</th>
                        <th scope="col" class="text-dark">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    <?php foreach ($role as $r) : ?>
                        <tr>
                            <th scope="row"><?= $i ?></th>
                            <td><?= $r['role'] ?></td>
                            <td>
                                <a href="<?= base_url('admin/role_akses/' . $r['id']); ?>" class="btn btn-success mr-2 neu-brutalism"><i class="fas fa-edit"></i> Akses</a>
                                <a href="#" onclick="ubah('<?= $r['id'] ?>')" class="btn btn-warning mr-2 neu-brutalism"><i class="fas fa-edit"></i> Ubah</a>
                                <a class="btn btn-danger neu-brutalism hapus" data-id="<?= $r['id'] ?>" data-url="<?= base_url('admin/role_hapus') ?>" data-role="<?= $r['role'] ?>"><i class="fas fa-trash"></i> Hapus</a>
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
<div class="modal fade" id="modalRoleBaru" tabindex="-1" role="dialog" aria-labelledby="modalRoleBaruLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content neu-brutalism-border">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="newModalRoleBaru">Tambah Role Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/role') ?>" method="POST">

                <div class="modal-body">
                    <div class="form-group">
                        <label for="role" class="form-label">Nama Role</label>
                        <input type="text" class="form-control" id="role" name="role">
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
<div class="modal fade" id="modalRoleUbah" tabindex="-1" role="dialog" aria-labelledby="modalRoleUbahLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content neu-brutalism-border">
            <div class="modal-header">
                <h5 class="modal-title modal-ubah text-dark" id="newModalRoleUbah">Ubah Role</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/role_ubah') ?>" method="POST">
                <input type="hidden" class="form-control" id="idUbah" name="id">

                <div class="modal-body">
                    <div class="form-group">
                        <label for="role" class="form-label">Nama Role</label>
                        <input type="text" class="form-control" id="roleUbah" name="role">
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
        $.get(`${baseUrl}admin/get_role/${id}`, (data) => {
            const role = $.parseJSON(data)
            // console.log(role)

            $('.modal-ubah').text('Ubah Role')
            $('#idUbah').val(role.id);
            $('#roleUbah').val(role.role);
            $('#modalRoleUbah').modal('show');
        })
    }

    const hapusRole = document.querySelectorAll('.hapus')
    hapusRole.forEach((hr) => {
        hr.addEventListener('click', () => {
            const dataId = hr.dataset.id
            const dataUrl = hr.dataset.url
            const dataRole = hr.dataset.role
            Swal.fire({
                icon: 'warning',
                html: `Apakah anda yakin ingin menghapus Role <b>${dataRole}</b>?`,
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