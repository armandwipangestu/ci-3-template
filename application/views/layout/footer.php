    <footer class="main-footer text-dark" style="border-top: 2px solid black !important">
        <div class="footer-left">
            Copyright &copy; 2023 <div class="bullet">Developed By </div>Arman
        </div>
        <div class="footer-right">
            v1.0
        </div>
    </footer>
    </div>
    </div>

    <!-- General JS Scripts -->
    <!-- ONLINE -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="<?= base_url(); ?>template/stisla/assets/js/stisla.js"></script> -->

    <!-- OFFLINE -->
    <script src="<?= base_url(); ?>assets/js/sweetalert/sweetalert.js"></script>
    <script src="<?= base_url(); ?>template/stisla/node_modules/jquery/dist/jquery.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script> -->
    <script src="<?= base_url(); ?>template/stisla/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?= base_url(); ?>template/stisla/node_modules/jquery.nicescroll/dist/jquery.nicescroll.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script> -->
    <script src="<?= base_url(); ?>template/stisla/assets/js/stisla.js"></script>

    <!-- JS Libraies -->

    <!-- Template JS File -->
    <script src="<?= base_url(); ?>template/stisla/assets/js/scripts.js"></script>
    <script src="<?= base_url(); ?>assets/js/datatables/datatables.js"></script>
    <script src="<?= base_url(); ?>template/stisla/assets/js/custom.js"></script>

    <!-- Page Specific JS File -->
    <script>
        // Preview the image uploaded
        function previewImage() {
            const gambar = document.querySelector(".gambar-preview");
            const imgPreview = document.querySelector(".img-preview");
            // console.log(imgPreview);

            const oFReader = new FileReader();
            oFReader.readAsDataURL(gambar.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            };

        }

        // Disable 'e' at input text as number
        const inputNumber = document.querySelector(".number")
        if (inputNumber) {
            inputNumber.addEventListener("keypress", function(evt) {
                if (evt.which != 8 && evt.which != 0 && evt.which < 48 || evt.which > 57) {
                    evt.preventDefault();
                }
            });
        }
    </script>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
    <script>
        const keluar = document.querySelector('#keluar');
        keluar.addEventListener('click', function() {
            const dataUrl = keluar.dataset.url;
            Swal.fire({
                icon: 'warning',
                html: `Apakah anda yakin ingin keluar?`,
                showCancelButton: true,
                confirmButtonColor: '#d9534f',
                cancelButtonColor: '#5cb85c',
                confirmButtonText: `Ya`,
                cancelButtonText: `Tidak`,
            }).then((result) => {
                if (result.isConfirmed) {
                    location.href = `${dataUrl}`
                }
            })
        });
    </script>
    <script>
        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop()
            $(this).next('.custom-file-label').addClass('selected').html(fileName);
        })

        $('.form-check-input').on('click', function() {
            const menuId = $(this).data('menu');
            const roleId = $(this).data('role');

            $.ajax({
                url: "<?= base_url('admin/ubah_akses'); ?>",
                type: "POST",
                data: {
                    menuId,
                    roleId
                },
                success: function() {
                    document.location.href = "<?= base_url('admin/role_akses/') ?>" + roleId;
                }
            })
        })
    </script>
    </body>

    </html>