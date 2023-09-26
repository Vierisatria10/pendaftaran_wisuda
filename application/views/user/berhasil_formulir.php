<div class="container-fluid">
    <?php echo $this->session->flashdata('pesan');?>
        <!-- Content Row -->
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body d-flex justify-content-center">
                       
                        <div class="text-center">
                            <img src="<?= base_url('assets/img/success.jpg') ?>" width="200" alt="">
                                <p>Selamat <b>Berhasil!</b> Anda Telah Melakukan Pendaftaran Wisuda, Silahkan Lakukan Cetak Blanko untuk dibawa pada saat acara wisuda dimulai.
                                <br><br>
                                <input type="hidden" name="username" id="username" value="<?= $this->session->userdata('username'); ?>">
                                <input type="hidden" name="nama" id="nama" value="<?= $this->session->userdata('nama'); ?>">
                                <a href="<?= base_url('user/cetakblanko/'. $this->session->userdata('username')) ?>" class="btn btn-success btn-sm"><i class="fas fa-print"></i> Cetak Blanko</a>
                            </p>
                        </div>
                       
                    </div>
                </div>
            </div>
            
        </div>

         <!-- Content Row -->
</div>