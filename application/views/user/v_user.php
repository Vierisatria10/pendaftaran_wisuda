<div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Data User/Pengguna</h1>
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
                            <a href="#" data-toggle="modal" data-target="#add_user" class=" btn btn-sm btn-block btn-primary shadow-sm"><i
                                class="fas fa-plus fa-sm text-white-50"></i> Tambah</a>
                            </div>
                        </div>
                    </div>
                   
                    <form action="">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card shadow mb-4">
                                    <div class="card-header bg-gradient-dark py-3">
                                        <h6 class="m-0 font-weight-bold text-white"><i class="fas fa-users"></i> Data User/Pengguna</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover" id="table_user" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th class="text-center">Nama</th>
                                                        <th class="text-center">Username</th>
                                                        <th class="text-center">Level</th>
                                                        <th class="text-center">Created Update</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $no = 1; foreach($data_user as $row): ?>
                                                        <tr>
                                                            <td><?= $no; ?></td>
                                                            <td class="text-center"><?= ucwords($row['nama']); ?></td>
                                                            <td class="text-center"><?= ucwords($row['username']); ?></td>
                                                            <td class="text-center">
                                                                <?php if($row['level'] == '1'): ?>
                                                                    <div class="badge badge-success">Admin</div>
                                                                <?php else: ?>
                                                                    <div class="badge badge-info">User</div>
                                                                <?php endif; ?>
                                                            </td>
                                                            <td class="text-center"><?= ucwords($row['created_update']); ?></td>
                                                            <td class="text-center">
                                                                <?php if($row['level'] == '1') : ?>
                                                                    <a href="" data-toggle="modal" data-target="#cetak_user<?= $row['id'] ?>" class="btn btn-success btn-sm disabled"><i class="fas fa-print"></i></a>
                                                                <?php else: ?>
                                                                    <a href="" data-toggle="modal" data-target="#cetak_user<?= $row['id'] ?>" class="btn btn-success btn-sm" target="_blank"><i class="fas fa-print"></i></a>
                                                                <?php endif; ?>
                                                                <a href="" data-toggle="modal" data-target="#detail_user<?= $row['id'] ?>" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                                                <a href="" data-toggle="modal" data-target="#edit_user<?= $row['id'] ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                                                <a href="" data-toggle="modal" data-target="#hapus_user<?= $row['id'] ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                                            </td>
                                                        </tr>
                                                    <?php $no++; endforeach; ?>
                                                </tbody>
                                            </table>
                                            <p>Keterengan : <br>
                                                <a href="#" class="btn btn-flat btn-sm btn-success"><span class="fas fa-print"></span></a> : Cetak <br>
                                                <a href="#" class="btn btn-flat btn-sm btn-info"><span class="fa fa-eye"></span></a> : Detail <br>
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
<div class="modal fade" id="add_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('User/add_user') ?>" method="POST">
            <div class="form-group">
                <label for="">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="form-group">
                <label for="">Username</label>
                <input type="text" id="username" name="username" class="form-control" required>
                <p class="text-danger">Gunakan NIM Mahasiswa</p>
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="">Level</label>
                <select name="level" class="form-control" id="level" required>
                    <option value="">--Pilih Status--</option>
                    <option value="1">Admin</option>
                    <option value="2">User</option>
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
<?php foreach($data_user as $row) : ?>
<div class="modal fade" id="edit_user<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('User/update_user') ?>" method="POST">
            <div class="form-group">
                <label for="">Nama</label>
                <input type="hidden" class="form-control" id="id" name="id">
                <input type="text" class="form-control" id="edit_nama" value="<?= $row['nama'] ?>" name="edit_nama">
            </div>
            <div class="form-group">
                <label for="">Username</label>
                <input type="text" id="edit_username" name="edit_username" value="<?= $row['username'] ?>" class="form-control">
                <p class="text-danger">Gunakan NIM Mahasiswa</p>
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" id="edit_password" name="edit_password" value="<?= $row['password']; ?>" class="form-control" disabled>
            </div>
            <div class="form-group">
                <label for="">Level</label>
                <select name="edit_level" class="form-control" id="edit_level">
                    <!-- <option value="">--Pilih Status--</option> -->
                    <option value="1" <?= $row['level'] == '1' ? 'selected' : '' ?>>Admin</option>
                    <option value="2" <?= $row['level'] == '2' ? 'selected' : '' ?>>User</option>
                </select>
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

<!-- Modal detail -->
<?php foreach($data_user as $row) : ?>
<div class="modal fade" id="detail_user<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('User/update_user') ?>" method="POST">
            <div class="form-group">
                <label for="">Nama</label>
                <input type="hidden" class="form-control" id="id" name="id">
                <input type="text" class="form-control" id="edit_nama" value="<?= $row['nama'] ?>" name="edit_nama" disabled>
            </div>
            <div class="form-group">
                <label for="">Username</label>
                <input type="text" id="edit_username" name="edit_username" value="<?= $row['username'] ?>" class="form-control" disabled>
                <!-- <p class="text-danger">Gunakan NIM Mahasiswa</p> -->
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" id="edit_password" name="edit_password" value="<?= $row['password']; ?>" class="form-control" disabled>
            </div>
            <div class="form-group">
                <label for="">Level</label>
                <select name="edit_level" class="form-control" id="edit_level" disabled>
                    <!-- <option value="">--Pilih Status--</option> -->
                    <option value="1" <?= $row['level'] == '1' ? 'selected' : '' ?>>Admin</option>
                    <option value="2" <?= $row['level'] == '2' ? 'selected' : '' ?>>User</option>
                </select>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update</button> -->
      </div>
      </form>
    </div>
  </div>
</div>
<?php endforeach; ?>

<!-- Modal Cetak -->
<?php foreach($data_user as $row) : ?>
<div class="modal fade" id="cetak_user<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="cetak_user<?= $row['id'] ?>" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cetak_user<?= $row['id'] ?>">Apakah kamu ingin Mencetak Data User ini?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('User/cetak_user') ?>" method="POST">
                <input type="hidden" id="id_cetak" name="id_cetak" value="<?= $row['id'] ?>">
                <input type="hidden" id="username_cetak" name="username_cetak" value="<?= $row['username'] ?>">
                <input type="hidden" id="password_cetak" name="password_cetak" value="<?= $row['password'] ?>">
                <input type="hidden" id="nama_univ" name="nama_univ" value="<?= $row['nama_univ'] ?>">
                <input type="hidden" id="alamat_univ" name="alamat_univ" value="<?= $row['alamat_univ'] ?>">
                <input type="hidden" id="no_telp" name="no_telp" value="<?= $row['no_telp'] ?>">
                <input type="hidden" id="email" name="email" value="<?= $row['email'] ?>">
                <p class="text-success">Cetak Data User : <b><?= $row['nama']; ?></b></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success"><i class="fas fa-print"></i> Cetak</button>
            </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach; ?>

<!-- Modal Delete -->
<?php foreach($data_user as $row) : ?>
<div class="modal fade" id="hapus_user<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="hapus_user<?= $row['id'] ?>" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="hapus_user<?= $row['id'] ?>">Apakah kamu ingin menghapus data ini?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('TahunAkademikController/hapus_user') ?>" method="POST">
                <input type="hidden" id="id_del" name="id_del" value="<?= $row['id'] ?>">
                <p class="text-danger">Menghapus Data User : <b><?= $row['nama']; ?></b></p>
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