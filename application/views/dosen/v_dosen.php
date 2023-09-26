<div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dosen Pembimbing</h1>
                    </div>

                    <!-- Content Row -->
                    <!-- <div class="row">
                        <div class="col-sm-12">
                            <div class="alert alert-info alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h4><i class="icon fa fa-check"></i> Informasi</h4>
                                    Mohon perhatian, hanya boleh satu periode yang aktif.
                            </div>       
                        </div>
                    </div> -->
                    
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="form-group">
                            <a href="#" data-toggle="modal" data-target="#add_dosen" class=" btn btn-sm btn-block btn-primary shadow-sm"><i
                                class="fas fa-plus fa-sm text-white-50"></i> Tambah</a>
                            </div>
                        </div>
                    </div>
                   
                    <form action="">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card shadow mb-4">
                                    <div class="card-header bg-gradient-dark py-3">
                                        <h6 class="m-0 font-weight-bold text-white"><i class="fas fa-users"></i> Data Dosen</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover" id="table_dosen" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th class="text-center">Dosen Pembimbing 1</th>
                                                        <th class="text-center">Dosen Pembimbing 2</th>
                                                        <th class="text-center">Created By</th>
                                                        <th class="text-center">Updated Date</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $no = 1; foreach($data_dosen as $row): ?>
                                                        <tr>
                                                            <td><?= $no; ?></td>
                                                            <td class="text-center"><?= ucwords($row['dosbing_1']); ?></td>
                                                            <td class="text-center"><?= ucwords($row['dosbing_2']); ?></td>
                                                            <td class="text-center">
                                                                <?= ucwords($row['created_by']); ?>
                                                            </td>
                                                            <td class="text-center"><?= ucwords($row['created_date']); ?></td>
                                                            <td class="text-center">
                                                                <a href="" data-toggle="modal" data-target="#edit_dosen<?= $row['id_dosbing'] ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                                                <a href="" data-toggle="modal" data-target="#hapus_dosen<?= $row['id_dosbing'] ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                                            </td>
                                                        </tr>
                                                    <?php $no++; endforeach; ?>
                                                </tbody>
                                            </table>
                                            <p>Keterengan : <br>
                                                <!-- <a href="#" class="btn btn-flat btn-sm btn-info"><span class="fa fa-eye"></span></a> : Detail <br> -->
                                                <a href="#" class="btn btn-flat btn-sm btn-warning"><span class="fas fa-edit"></span></a> : Edit<br>
                                                <a href="#" class="btn btn-flat btn-sm btn-danger"><span class="fa fa-trash"></span></a> : Hapus	
        	                                </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    

                    <!-- Content Row -->

                </div>
    
<!-- Modal add -->
<div class="modal fade" id="add_dosen" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Dosen</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('DosenController/add_dosen') ?>" method="POST">
            <div class="form-group">
                <label for="">Dosen Pembimbing 1</label>
                <input type="text" class="form-control" id="" name="dosbing_1" required>
            </div>
            <div class="form-group">
                <label for="">Dosen Pembimbing 2</label>
                <input type="text" id="" name="dosbing_2" class="form-control" required>
                <!-- <p class="text-danger">Gunakan NIM Mahasiswa</p> -->
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal edit -->
<?php foreach($data_dosen as $row) : ?>
<div class="modal fade" id="edit_dosen<?= $row['id_dosbing'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Dosen</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('DosenController/update_dosen') ?>" method="POST">
            <div class="form-group">
                <label for="">Dosen Pembimbing 1</label>
                <input type="hidden" id="id_dosbing" name="id_dosbing" class="form-control" value="<?= $row['id_dosbing']; ?>">
                <input type="text" class="form-control" id="edit_dosbing_1" name="edit_dosbing_1" value="<?= $row['dosbing_1'] ?>">
            </div>
            <div class="form-group">
                <label for="">Dosen Pembimbing 2</label>
                <input type="text" id="edit_dosbing_2" name="edit_dosbing_2" class="form-control" value="<?= $row['dosbing_2'] ?>">
                <!-- <p class="text-danger">Gunakan NIM Mahasiswa</p> -->
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update</button>
      </div>
      </form>
    </div>
  </div>
</div>
<?php endforeach; ?>

<!-- Modal Delete -->
<?php foreach($data_dosen as $row) : ?>
<div class="modal fade" id="hapus_dosen<?= $row['id_dosbing'] ?>" tabindex="-1" role="dialog" aria-labelledby="hapus_dosen<?= $row['id_dosbing'] ?>" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="hapus_dosen<?= $row['id_dosbing'] ?>">Apakah kamu ingin menghapus data ini?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('DosenController/hapus_dosen') ?>" method="POST">
                <input type="hidden" id="id_del" name="id_del" value="<?= $row['id_dosbing'] ?>">
                <p class="text-danger">Menghapus Data Dosen Pembimbing yang dibuat oleh : <b><?= $row['created_by']; ?></b></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</button>
            </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach; ?>

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