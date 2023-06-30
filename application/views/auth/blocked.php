<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header neu-brutalism-border">
            <h1><?= $title; ?></h1>
        </div>
        <div class="container mt-5">
            <div class="page-error">
                <div class="page-inner">
                    <h1><?= $error_code; ?></h1>
                    <div class="page-description">
                        <?= $error_message; ?>
                    </div>
                    <div class="mt-3">
                        <a href="<?= base_url(); ?>" class="btn btn-icon icon-left btn-primary mb-4 neu-brutalism"><i class="fas fa-arrow-left"></i> Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>