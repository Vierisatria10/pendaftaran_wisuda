<div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Thakademik</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="alert alert-info alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h4><i class="icon fa fa-check"></i> Informasi</h4>
                                    Mohon perhatian, hanya boleh satu periode yang aktif.
                            </div>       
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="form-group">
                            <a href="#" data-toggle="modal" data-target="#add_akademik" class="d-none d-sm-inline-block btn btn-sm btn-block btn-primary shadow-sm"><i
                                class="fas fa-plus fa-sm text-white-50"></i> Tambah</a>
                            </div>
                        </div>
                    </div>
                   
                    <form action="">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card shadow mb-4">
                                    <div class="card-header bg-gradient-dark py-3">
                                        <h6 class="m-0 font-weight-bold text-white"><i class="fas fa-calendar-alt"></i> Tahun Akademik</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover" id="table_akademik" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th class="text-center">Tahun Akademik</th>
                                                        <th class="text-center">Periode</th>
                                                        <th class="text-center">Kererangan</th>
                                                        <th class="text-center">Status</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $no = 1; foreach($get_data as $row): ?>
                                                        <tr>
                                                            <td><?= $no; ?></td>
                                                            <td><?= ucwords($row['tahun_akademik']); ?></td>
                                                            <td><?= ucwords($row['periode']); ?></td>
                                                            <td><?= ucwords($row['keterangan']); ?></td>
                                                            <td class="text-center">
                                                                <?php if($row['status'] == 'Aktif'): ?>
                                                                    <div class="badge badge-success">Aktif</div>
                                                                <?php else: ?>
                                                                    <div class="badge badge-danger">Tidak Aktif</div>
                                                                <?php endif; ?>
                                                            </td>
                                                            <td class="text-center">
                                                                <a href="" data-toggle="modal" data-target="#edit_akademik<?= $row['id_tahun'] ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                                                <a href="" data-toggle="modal" data-target="#hapus_akademik<?= $row['id_tahun'] ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
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
<div class="modal fade" id="add_akademik" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Tahun Akademik</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('TahunAkademikController/add_akademik') ?>" method="POST">
            <div class="form-group">
                <label for="">Tahun Akademik</label>
                <input type="text" class="form-control" id="th_akademik" name="th_akademik" required>
            </div>
            <div class="form-group">
                <label for="">Periode</label>
                <input type="text" id="periode" name="periode" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="">Keterangan</label>
                <textarea name="keterangan" class="form-control" id="keterangan" required></textarea>
            </div>
            <div class="form-group">
                <label for="">Status</label>
                <select name="status" class="form-control" id="status" required>
                    <option value="">--Pilih Status--</option>
                    <option value="Aktif">Aktif</option>
                    <option value="Tidak Aktif">Tidak Aktif</option>
                </select>
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
<?php foreach($get_data as $row) : ?>
<div class="modal fade" id="edit_akademik<?= $row['id_tahun'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Tahun Akademik</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('TahunAkademikController/update_akademik') ?>" method="POST">
            <div class="form-group">
                <label for="">Tahun Akademik</label>
                <input type="hidden" class="form-control" name="id_tahun" id="id_tahun" value="<?= $row['id_tahun']; ?>">
                <input type="text" class="form-control" value="<?= $row['tahun_akademik'] ?>" id="th_akademik" name="edit_th_akademik">
            </div>
            <div class="form-group">
                <label for="">Periode</label>
                <input type="text" id="periode" value="<?= $row['periode'] ?>" name="edit_periode" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Keterangan</label>
                <textarea name="edit_keterangan" class="form-control" id="keterangan">
                <?= $row['keterangan'] ?>
                </textarea>
            </div>
            <div class="form-group">
                <label for="">Status</label>
                <select name="edit_status" class="form-control" id="status">
                    <!-- <option value="">--Pilih Status--</option> -->
                        <option value="Aktif" <?= $row['status'] == 'Aktif' ? 'selected' : '' ?>>Aktif</option>
                        <option value="Tidak Aktif" <?= $row['status'] == 'Tidak Aktif' ? 'selected':''?>>Tidak Aktif</option>
                </select>
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
<?php endforeach; ?>

<!-- Modal Delete -->
<?php foreach($get_data as $row) : ?>
<div class="modal fade" id="hapus_akademik<?= $row['id_tahun'] ?>" tabindex="-1" role="dialog" aria-labelledby="hapus_akademik<?= $row['id_tahun'] ?>" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="hapus_akademik<?= $row['id_tahun'] ?>">Apakah kamu ingin menghapus data ini?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('TahunAkademikController/hapus_akademik') ?>" method="POST">
                <input type="hidden" id="id_tahun_del" name="id_tahun_del" value="<?= $row['id_tahun'] ?>">
                <p class="text-danger">Menghapus Data Tahun Akademik : <b><?= $row['periode']; ?></b></p>
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