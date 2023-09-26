<div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Jurusan</h1>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="form-group">
                            <a href="#" data-toggle="modal" data-target="#add_jurusan" class=" btn btn-sm btn-block btn-primary shadow-sm"><i
                                class="fas fa-plus fa-sm text-white-50"></i> Tambah</a>
                            </div>
                        </div>
                    </div>
                   
                    <form action="">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card shadow mb-4">
                                    <div class="card-header bg-gradient-dark py-3">
                                        <h6 class="m-0 font-weight-bold text-white"><i class="fas fa-graduation-cap"></i> Data Jurusan</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover" id="table_jurusan" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th class="text-center">Nama Jenjang</th>
                                                        <th class="text-center">Nama Jurusan</th>
                                                        <th class="text-center">Nama Fakultas</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $no = 1; foreach($data_jurusan as $row): ?>
                                                        <tr>
                                                            <td><?= $no; ?></td>
                                                            <td class="text-center"><?= ucwords($row['nama_jenjang']); ?></td>
                                                            <td class="text-center"><?= ucwords($row['nama_jurusan']); ?></td>
                                                            <td class="text-center">
                                                                <?= ucwords($row['nama_fakultas']); ?>
                                                            </td>
                                                            <td class="text-center">
                                                                <a href="" data-toggle="modal" data-target="#edit_jurusan<?= $row['id_jurusan'] ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                                                <a href="" data-toggle="modal" data-target="#hapus_jurusan<?= $row['id_jurusan'] ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
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
<div class="modal fade" id="add_jurusan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Jurusan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('JurusanController/add_jurusan') ?>" method="POST">
            <div class="form-group">
                <label for="">Nama Jenjang</label>
                <input type="text" class="form-control" id="nama_jenjang" name="nama_jenjang" required>
            </div>
            <div class="form-group">
                <label for="">Nama Jurusan</label>
                <input type="text" id="nama_jurusan" name="nama_jurusan" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="">Nama Fakultas</label>
                <input type="text" id="nama_fakultas" name="nama_fakultas" class="form-control" required>
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
<?php foreach($data_jurusan as $row) : ?>
<div class="modal fade" id="edit_jurusan<?= $row['id_jurusan'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Jurusan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('JurusanController/update_jurusan') ?>" method="POST">
            <div class="form-group">
                <label for="">Nama Jenjang</label>
                <input type="hidden" id="" name="id_jurusan" class="form-control" value="<?= $row['id_jurusan']; ?>">
                <input type="text" class="form-control" id="edit_nama_jenjang" name="edit_nama_jenjang" value="<?= $row['nama_jenjang'] ?>">
            </div>
            <div class="form-group">
                <label for="">Nama Jurusan</label>
                <input type="text" id="edit_nama_jurusan" name="edit_nama_jurusan" class="form-control" value="<?= $row['nama_jurusan'] ?>">
            </div>
            <div class="form-group">
                <label for="">Nama Fakultas</label>
                <input type="text" id="edit_nama_fakultas" name="edit_nama_fakultas" class="form-control" value="<?= $row['nama_fakultas'] ?>">
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
<?php foreach($data_jurusan as $row) : ?>
<div class="modal fade" id="hapus_jurusan<?= $row['id_jurusan'] ?>" tabindex="-1" role="dialog" aria-labelledby="hapus_jurusan<?= $row['id_jurusan'] ?>" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="hapus_jurusan<?= $row['id_jurusan'] ?>">Apakah kamu ingin menghapus data ini?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('JurusanController/hapus_jurusan') ?>" method="POST">
                <input type="hidden" id="id_del" name="id_del" value="<?= $row['id_jurusan'] ?>">
                <p class="text-danger">Menghapus Data Jurusan : <b><?= $row['nama_jurusan']; ?></b></p>
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
            title: "Berhasil!",
            text: "<?= $this->session->flashdata('success') ?>",
            icon: "success",
            showConfirmButton: true,
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
        });
    </script>
<?php endif; ?>