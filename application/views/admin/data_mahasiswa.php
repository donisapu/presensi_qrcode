<div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-purple" style="color: purple">Data Mahasiswa</h6>
                        </div>
                        <div class="card-body">
                        <?php echo $this->session->flashdata('suces')?>
                            <br>

                <button type="button"  data-toggle="modal" data-target="#tambah" class="btn btn-primary btn-icon-split">
                    <span class="icon text-purple-600">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Tambah</span>
                </button> 
                <br><br>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="color: black">
                        <thead>
                            <tr>
                            <th>No</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Tanggal Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>Telepon</th>
                            <th>Opsi</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                        <?php $no=1; foreach ($mahasiswa->result() as $key) {
                            ?>
                        <tr>
                        <th><?php echo $no++;?></th>
                        <td><?php echo $key->nim;?></td>
                        <td><?php echo $key->nama;?></td>
                        <td><?php echo $key->tgl_lahir;?></td>
                        <td><?php echo $key->jenis_kelamin;?></td>
                        <td><?php echo $key->alamat;?></td>
                        <td><?php echo $key->no_telp;?></td>
                                               
                        <td>
                        
                            <button type="button" class="btn btn-light btn-sm btn-circle" data-toggle="modal" data-target="#edit<?= $key->id_mahasiswa?>" title="Edit"><i class="fa fa-pen"></i></button>
                            <div id="edit<?= $key->id_mahasiswa?>" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            
                                            <h4 class="modal-title">Edit Data Mahasiswa</h4>
                                            <button type="button" class="close" data-dismiss="modal">x</button>
                                        </div>
                                        <form role="form" method="POST" action="<?php echo site_url('admin/editmahasiswa/'.$key->id_mahasiswa)?>">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                <span>NIM</span>
                                                <input class="form-control" type="text" placeholder="text" name="nim" value="<?= $key->nim?>" required><br>
                                                <span>Nama Mahasiswa</span>
                                                <input class="form-control" type="text" placeholder="text" value="<?= $key->nama?>" name="nama" required><br>
                                                <span>Tanggal Lahir</span>
                                                <input class="form-control" type="date" placeholder="text" value="<?= $key->tgl_lahir?>" name="tgl_lahir" required><br>
                                                <span>Jenis Kelamin</span>
                                                <select class="form-control" type="text" name="jenis_kelamin" required>
                                                    <option value="<?= $key->jenis_kelamin?>"><?= $key->jenis_kelamin?></option>
                                                    <option value="Laki-laki">Laki-laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select><br>
                                                <span>Alamat</span>
                                                <input class="form-control" type="text" placeholder="text" value="<?= $key->alamat?>" name="alamat" required><br>
                                                <span>Telepon</span>
                                                <input class="form-control" type="text" placeholder="text" name="no_telp" value="<?= $key->no_telp?>" required><br>
                                                <div class="modal-footer">
                                                <button class="btn btn-light" data-dismiss="modal">Batal</button>
                                                <input type="submit" class="btn btn-primary" value="Update">
                                                </div>
                                                </div>
                                            </div>
                                    </form> 
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo site_url('admin/hapusmahasiswa/'.$key->id_mahasiswa)?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ?')" class=" btn btn-light btn-circle btn-sm" title="Hapus"><i class="fa fa-trash"></i></a>
                        </td>
                        
                        </tr>
                        <?php } ?>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <div id="tambah" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    
                    <h4 class="modal-title">Tambah Data Mahasiswa</h4>
                    <button type="button" class="close" data-dismiss="modal">x</button>
                </div>
                <form role="form" method="POST" action="<?php echo site_url('admin/tambahmahasiswa')?>">
                    <div class="modal-body">
                        <div class="form-group">
                        <span>NIM</span>
                        <input class="form-control" type="text" placeholder="text" name="nim" required><br>
                        <span>Nama Mahasiswa</span>
                        <input class="form-control" type="text" placeholder="text" name="nama" required><br>
                        <span>Tanggal Lahir</span>
                        <input class="form-control" type="date" placeholder="text" name="tgl_lahir" required><br>
                        <span>Jenis Kelamin</span>
                        <select class="form-control" type="text" name="jenis_kelamin" required>
                            <option value="">-pilih-</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select><br>
                        <span>Alamat</span>
                        <input class="form-control" type="text" placeholder="text" name="alamat" required><br>
                        <span>Telepon</span>
                        <input class="form-control" type="text" placeholder="text" name="no_telp" required><br>
                        <button class="btn btn-light" data-dismiss="modal">Batal</button>
                        <input type="submit" class="btn btn-primary" value="Tambah">
                        </div>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
