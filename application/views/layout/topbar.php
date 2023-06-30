<div class="navbar-bg" style="border-bottom: 2px solid black !important;"></div>
<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
        </ul>
    </form>
    <ul class="navbar-nav navbar-right">
        <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="<?= base_url(); ?>assets/img/profile/<?= $user['image'] ?>" class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block">Hi, <?= $user['nama']; ?></div>
            </a>
            <div class="dropdown-menu dropdown-menu-right neu-brutalism-border">
                <a href="<?= base_url('user'); ?>" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> Profil Saya
                </a>
                <a href="<?= base_url('user/ubah'); ?>" class="dropdown-item has-icon">
                    <i class="fas fa-user-edit"></i> Ubah Profil
                </a>
                <a href="#" data-url="<?= base_url('auth/keluar'); ?>" class="dropdown-item has-icon text-danger" id="keluar">
                    <i class="fas fa-sign-out-alt"></i> Keluar
                </a>
            </div>
        </li>
    </ul>
</nav>