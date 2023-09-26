<div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Laporan</h1>
                        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
                    </div>

                    <!-- Content Row -->
                    
                        <div class="row">
                            
                            <div class="col-sm-2">
                                <form action="<?= base_url('LaporanController/exportexcel') ?>" method="POST">
                                <div class="form-group">
                                    <label>&nbsp</label>
                                    <button id="export" type='submit' class="btn btn-flat btn-block btn-warning disabled"><span class="fa fa-print"></span> Cetak</button>
                                </div>
                                </form>		
                            </div>
                           
                            <div class="col-md-12">
                                
                                <div class="card shadow mb-4">
                                    <div class="card-header bg-gradient-dark py-3">
                                        <h6 class="m-0 font-weight-bold text-white"><i class="fas fa-print"></i> Laporan</h6>
                                    </div>
                                    <div class="card-body">
                                        <!-- <div id="pencarian">
                                            <div class="text-center"><i class="fa fa-refresh fa-spin"></i> Loading data. Please wait...</div>
                                        </div> -->
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover" id="table_laporan" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th class="text-center">Tahun Akademik</th>
                                                        <th class="text-center">Nama</th>
                                                        <th class="text-center">NIM</th>
                                                        <th class="text-center">Judul Skripsi/TA</th>
                                                        <th class="text-center">Aksi</th>
                                                    </tr>
                                                </thead>
                                            
                                                <tbody>
                                                    <?php $no = 1; foreach($get_laporan as $row): ?>
                                                        <tr>
                                                            <td><?= $no; ?></td>
                                                            <td class="text-center"><?= ucwords($row->periode) ?></td>
                                                            <td class="text-center"><?= ucwords($row->nama) ?></td>
                                                            <td class="text-center"><?= ucwords($row->nim) ?></td>
                                                            <td class="text-center"><?= ucwords($row->judul_skripsi) ?></td>
                                                            <td>
                                                                <a href="" data-toggle="modal" data-target="#cetak_print<?= $row->id_formulir ?>" class="btn btn-success btn-sm"><i class="fas fa-print"></i></a>
                                                                <!-- <a href="" data-toggle="modal" data-target="#hapus_dosen<?= $row->id_formulir ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a> -->
                                                            </td>
                                                        </tr>
                                                    <?php $no++; endforeach; ?>
                                                </tbody>
                                            </table>
                                            <p>Keterengan : <br>
                                                <!-- <a href="#" class="btn btn-flat btn-sm btn-info"><span class="fa fa-eye"></span></a> : Detail <br> -->
                                                <a href="#" class="btn btn-flat btn-sm btn-success"><span class="fas fa-print"></span></a> : Cetak Pdf<br>
                                                <!-- <a href="#" class="btn btn-flat btn-sm btn-danger"><span class="fa fa-trash"></span></a> : Hapus	 -->
        	                                </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                    

                    <!-- Content Row -->

                </div>

<?php foreach($get_laporan as $row) : ?>
<div class="modal fade" id="cetak_print<?= $row->id_formulir ?>" tabindex="-1" role="dialog" aria-labelledby="cetak_print<?= $row->id_formulir ?>" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cetak_print<?= $row->id_formulir ?>">Apakah kamu ingin Mencetak Laporan ini?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('LaporanController/cetak_laporan') ?>" method="POST">
                <input type="hidden" id="id_formulir" name="id_formulir" value="<?= $row->id_formulir ?>">
                
                <p class="text-success">Cetak Data Laporan : <b><?= $row->nama; ?></b></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success" target="_blank"><i class="fas fa-print"></i> Cetak</button>
            </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach; ?>

<?php include 'action_js.php';