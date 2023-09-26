<div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>

                    <?php echo $this->session->flashdata('pesan');?>
                    <!-- Content Row -->
                    <div class="row">
                    
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-4 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        
                                        <div class="col mr-2">
                                            <div class="text-sm font-weight-bold text-dark mb-1">
                                               
                                            </div>

                                            <div class="h5 mb-0 justify-content-center d-flex font-weight-bold text-white">
                                                <img src="<?= base_url('assets/img/bg-graduation.png') ?>" width="200" alt="">
                                            </div>
                                        </div>
                                        
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-8 col-md-8 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-sm font-weight-bold text-dark mb-1">
                                                Selamat Datang di Website Pendaftaran Wisuda
                                                <br> Anda Login Sebagai <?= $this->session->userdata('nama'); ?> Silahkan Lakukan Pengisian Formulir di bawah ini 
                                                <br><br>
                                                <a href="<?= base_url('user/formulir') ?>" class="btn btn-primary btn-block btn-sm"><i class="fas fa-file-alt"></i> Isi Formulir</a>
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-white">$40,000</div>
                                        </div>
                                        <!-- <div class="col-auto">
                                            <i class="fas fa-user fa-2x text-white"></i>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>

                       
                    </div>

                    <!-- Content Row -->

                </div>