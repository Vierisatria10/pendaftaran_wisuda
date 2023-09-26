<div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-file-alt"></i> Pendaftaran Wisuda</h1>
                        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="alert alert-primary alert-dismissible">
                                <!-- <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> -->
                                <h4><i class="icon fa fa-graduation-cap"></i> Informasi Wisuda</h4>
                                    <?php foreach($get_data as $row) : ?>
                                        <?php if($row->status == 'Aktif') : ?>
                                            <?= $row->keterangan; ?>
                                        <?php else : ?>
                                            <p>Tahun Akademik Tidak aktif</p>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                            </div>       
                        </div>
                    </div>

                    <?php echo $this->session->flashdata('pesan');?>
                    <!-- Content Row -->
                    <?php foreach($get_data as $row) : ?>
                        
                    <div class="row">
                        <?php if($row->status == 'Aktif') : ?>
                        <div class="col-md-12">
                            
                                <div class="card">
                                    <div class="card-body">
                            
                                        <p>Pendaftaran Wisuda</p>
                                        <form class="needs-validation" action="<?= base_url('User/formulir') ?>" method="POST" enctype="multipart/form-data" novalidate>
                                            <div class="form-row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="validationCustom01"><b>Periode/Tahun Akademik</b></label>
                                                    <select name="id_tahun" class="form-control" id="tahun">
                                                        <option value="">--Pilih Tahun Akademik--</option>
                                                        <?php foreach($get_periode as $per) : ?>
                                                        <option value="<?= $per->id_tahun; ?>"><?= $per->periode; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="validationCustom02"><b>IPK</b></label>
                                                    <input type="text" class="form-control" id="ipk" name="ipk" required>
                                                    <small class="text-sm">Dalam Skala: 4</small>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="validationCustom03"><b>Nomor Mahasiswa</b></label>
                                                    <input type="text" class="form-control" id="username" name="username" disabled value="<?= $this->session->userdata('username') ?>" required>
                                                    <div class="invalid-feedback">
                                                        Please provide a valid city.
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="validationCustom04">Dosen Pembimbing 1</label>
                                                    <select class="form-select" id="dosbing_1" name="dosbing_1" required>
                                                        <?php foreach($get_dosen as $row) : ?>
                                                        <option value="<?= $row['dosbing_1'] ?>"><?= $row['dosbing_1']; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Please select a valid state.
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="validationCustom05"><b>Jenjang/Jurusan/Fakultas</b></label>
                                                    <select name="id_jurusan" id="id_jurusan" class="form-control">
                                                        <option value="">--Pilih Jenjang/Jurusan/Fakultas--</option>
                                                        <?php foreach($data_jurusan as $row) : ?>
                                                        <option value="<?= $row['id_jurusan']; ?>"><?= $row['nama_jenjang'].'/'.$row['nama_jurusan'].'/'.$row['nama_fakultas'] ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Please provide a valid zip.
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="validationCustom04">Dosen Pembimbing 2</label>
                                                    <select class="form-select" id="dosbing_2" name="dosbing_2" required>
                                                        <?php foreach($get_dosen as $row) : ?>
                                                        <option value="<?= $row['dosbing_2'] ?>"><?= $row['dosbing_2']; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Please select a valid state.
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="validationCustom05"><b>Agama</b></label>
                                                    <select name="agama" id="agama" class="form-control">
                                                        <option value="Islam">Islam</option>
                                                        <option value="Hindu">Hindu</option>
                                                        <option value="Budha">Budha</option>
                                                        <option value="Kristen">Kristen</option>
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Please provide a valid zip.
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="validationCustom02"><b>Foto</b></label>
                                                    <input type="file" class="form-control" id="foto" name="foto" required>
                                                    <small class="text-sm">Maksimal ukuran 5mb, format JPG|jpeg|png. foto berdasi dengan background warna terang</small>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                    <label for="validationCustom05"><b>Tahun Masuk/Lulus</b></label>
                                                    <input type="text" class="form-control" name="tahun_masuk" id="tahun_masuk" placeholder="Tahun Masuk">
                                                    <div class="invalid-feedback">
                                                        Please provide a valid zip.
                                                    </div>
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                    <label for="validationCustom05"><br></label>
                                                    <input type="text" class="form-control" name="tahun_lulus" id="tahun_lulus" placeholder="Tahun Lulus">
                                                    <div class="invalid-feedback">
                                                        Please provide a valid zip.
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="validationCustom02"><b>Bukti Pembayaran</b></label>
                                                    <input type="file" class="form-control" id="bukti_bayar" name="bukti_bayar" required>
                                                    <small class="text-sm">Maksimal ukuran 5mb, format JPG|jpeg|png.</small>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="validationCustom02"><b>Judul Skripsi</b></label>
                                                    <textarea name="judul_skripsi" id="" class="form-control" rows="4"></textarea>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <p><b>Data Diri</b></p>
                                            <div class="form-row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="validationCustom01"><b>Nama</b></label>
                                                    <input type="text" name="nama" value="<?= $this->session->userdata('nama') ?>" class="form-control" id="nama">
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="validationCustom02"><b>Tempat Lahir</b></label>
                                                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" required>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="validationCustom01"><b>Tanggal Lahir</b></label>
                                                        <input type="text" name="tgl_lahir" class="form-control datepicker" id="tgl_lahir">
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="validationCustom02"><b>Nama Orang Tua/Wali</b></label>
                                                    <input type="text" class="form-control" id="nama_ortu" name="nama_ortu" required>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="validationCustom01"><b>Alamat Tinggal</b></label>
                                                    <textarea name="alamat_tinggal" id="" class="form-control" rows="4"></textarea>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="validationCustom02"><b>Alamat Asal</b></label>
                                                    <textarea name="alamat_asal" id="" class="form-control" rows="4"></textarea>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="validationCustom01"><b>Email</b></label>
                                                    <input type="email" name="email" class="form-control" id="email">
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="validationCustom02"><b>No. Telp</b></label>
                                                    <input type="text" class="form-control" id="no_hp" name="no_hp" required>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="validationCustom01"><b>Apabila sudah bekerja, kerja di</b></label>
                                                    <input type="text" name="bekerja" class="form-control" id="bekerja">
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="validationCustom02"><b>Alamat Tempat Kerja</b></label>
                                                    <textarea name="alamat_bekerja" id="alamat_bekerja" class="form-control" rows="4"></textarea>
                                                    <div class="valid-feedback">
                                                        Looks good!
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                                                    <label class="form-check-label" for="invalidCheck">
                                                        Semua Data Sudah diisi
                                                    </label>
                                                    <div class="invalid-feedback">
                                                        You must agree before submitting.
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="btn btn-primary btn-block" name="submit" value="submit" type="submit">Simpan Data</button>
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
                                <?php else : ?>
                                <div class="card">
                                    <div class="card-boody">
                                        <p>Data Tahun Akademik Tidak Tersedia</p> 
                                    </div>
                                </div>             
                                <?php endif; ?>
                        </div>
                        
                    </div>
                    <!-- <div class="row">
                        <div class="col-md-12">
                            
                        </div>
                    </div> -->
                    <?php endforeach; ?>
                   
                   
                  
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