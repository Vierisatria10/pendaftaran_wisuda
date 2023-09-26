<div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-cogs"></i> Pengaturan Website</h1>
                    </div>


                    <?php echo $this->session->flashdata('pesan');?>
                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <p>Pendaftaran Wisuda</p>
                                    <form class="needs-validation" action="<?= base_url('User/update_pengaturan') ?>" method="POST" enctype="multipart/form-data" novalidate>
                                        <?php foreach($data_setting as $row) : ?>
                                        <div class="form-row">
                                            <div class="col-md-6 mb-3">
                                                <label for="validationCustom01"><b>Nama Website</b></label>
                                                <input type="hidden" class="form-control" name="id_pengaturan" id="id_pengaturan" value="<?= $row->id_setting; ?>">
                                                <input type="text" class="form-control" name="nama_website" id="nama_website" value="<?= $row->nama_website; ?>">
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="validationCustom02"><b>Nama Universitas</b></label>
                                                <input type="text" class="form-control" id="nama_univ" name="nama_univ" value="<?= $row->nama_univ; ?>">
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6 mb-3">
                                                <?php if ($row->logo == '') : ?>
                                                    <img src="<?= base_url('assets/img/default.png'); ?>" alt="">
                                                <?php else: ?>
                                                    <img src="<?= base_url('upload/logo/'. $row->logo); ?>" width="100" alt="">
                                                <?php endif; ?>
                                                <label for=""><b>Logo</b></label>
                                                <input type="file" name="logo" class="form-control" id="logo">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="">Icon</label>\
                                                <input type="text" class="form-control" name="icon" id="icon" value="<?= $row->icon; ?>">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6 mb-3">
                                                <label for="validationCustom02"><b>No. Telp</b></label>
                                                <input type="text" class="form-control" id="no_telp" name="no_telp" value="<?= $row->no_telp; ?>">
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="validationCustom02"><b>Email</b></label>
                                                <input type="text" class="form-control" id="email" name="email" value="<?= $row->email; ?>">
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="validationCustom02"><b>Alamat Universitas</b></label>
                                                <input type="text" value="<?= $row->alamat_univ; ?>" name="alamat_univ" class="form-control" id="alamat_univ" rows="4">
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                           
                                            
                                        </div>
                                        <?php endforeach; ?>
                                        <button class="btn btn-primary btn-block" name="submit" value="submit" type="submit">Update Data</button>
                                    </form>

                                    <script>
                                    // Example starter JavaScript for disabling form submissions if there are invalid fields
                                    (function() {
                                    'use strict';
                                    window.addEventListener('load', function() {
                                        // Fetch all the forms we want to apply custom Bootstrap validation styles to
                                        var forms = document.getElementsByClassName('needs-validation');
                                        // Loop over them and prevent submission
                                        var validation = Array.prototype.filter.call(forms, function(form) {
                                        form.addEventListener('submit', function(event) {
                                            if (form.checkValidity() === false) {
                                            event.preventDefault();
                                            event.stopPropagation();
                                            }
                                            form.classList.add('was-validated');
                                        }, false);
                                        });
                                    }, false);
                                    })();
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->

                </div>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php if ($this->session->flashdata('success')) : ?>
    <script>
        Swal.fire({
            title: "Congratulation",
            text: "<?= $this->session->flashdata('success') ?>",
            icon: "success",
            showConfirmButton: true,
            timer: 30000,
        });
    </script>
<?php endif; ?>

<?php if ($this->session->flashdata('update')) : ?>
    <script>
        Swal.fire({
            title: "Update",
            text: "<?= $this->session->flashdata('update') ?>",
            icon: "success",
            showConfirmButton: true,
            timer: 1000,
        });
    </script>
<?php endif; ?>