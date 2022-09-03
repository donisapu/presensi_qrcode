<div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-purple" style="color: purple">Atur Jadwal</h6>
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
                            <th>Kelas</th>
                            <th>Mapel</th>
                            <th>Hari</th>
                            <th>Jam Masuk</th>
                            <th>Jam Pulang</th>
                            <th>Data Mahasiswa</th>
                            <th>Opsi</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                        <?php $no=1; foreach ($atur->result() as $key) {
                            ?>
                        <tr>
                        <th><?php echo $no++;?></th>
                        <td><?php echo $key->nama_kelas;?></td>
                        <td><?php echo $key->nama_mapel;?></td>
                        <td><?php echo $key->hari;?></td>
                        <td><?php echo $key->jam_masuk;?></td>
                        <td><?php echo $key->jam_pulang;?></td>
                        <td>
                            <a href="<?= site_url('admin/detail_jadwal/'.$key->id_jadwal)?>" class="btn btn-primary btn-sm">Detail</a>
                        </td>
                                               
                        <td>
                        
                            <button type="button" class="btn btn-light btn-sm btn-circle" data-toggle="modal" data-target="#edit<?= $key->id_jadwal?>" title="Edit"><i class="fa fa-pen"></i></button>
                            <div id="edit<?= $key->id_jadwal?>" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            
                                            <h4 class="modal-title">Edit Data</h4>
                                            <button type="button" class="close" data-dismiss="modal">x</button>
                                        </div>
                                        <form role="form" method="POST" action="<?php echo site_url('admin/editaturjadwal/'.$key->id_jadwal)?>">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                <span>Mapel Kelas</span>
                                                <select class="form-control" name="id_detail_kelas" required>
                                                    <option value="<?= $key->id_detail_kelas?>"><?= $key->nama_kelas.'/'.$key->nama_mapel?></option>
                                                    <?php foreach ($mapel as $k ): ?>
                                                        <option value="<?= $k->id_detail_kelas?>"><?= $k->nama_kelas.'/'.$k->nama_mapel?></option>
                                                    <?php endforeach ?>
                                                </select><br>
                                                <span>Hari</span>
                                                <input type="text" name="hari" class="form-control" value="<?= $key->hari?>" required><br>
                                                <span>Jam Masuk</span>
                                                <input type="time" name="jam_masuk" class="form-control" value="<?= $key->jam_masuk?>" required><br>
                                                <span>Jam Pulang</span>
                                                <input type="time" name="jam_pulang" class="form-control" value="<?= $key->jam_pulang?>" required><br>
                                                
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
                            <a href="<?php echo site_url('admin/hapusaturjadwal/'.$key->id_jadwal)?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ?')" class=" btn btn-light btn-circle btn-sm" title="Hapus"><i class="fa fa-trash"></i></a>
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
                    
                    <h4 class="modal-title">Tambah Data</h4>
                    <button type="button" class="close" data-dismiss="modal">x</button>
                </div>
                <form role="form" method="POST" action="<?php echo site_url('admin/tambahaturjadwal')?>">
                    <div class="modal-body">
                        <div class="form-group">
                        <span>Mapel Kelas</span>
                        <select class="form-control" name="id_detail_kelas" required>
                            <option value="">-pilih-</option>
                            <?php foreach ($mapel as $k ): ?>
                                <option value="<?= $k->id_detail_kelas?>"><?= $k->nama_kelas.'/'.$k->nama_mapel?></option>
                            <?php endforeach ?>
                        </select><br>
                        <span>Hari</span>
                        <input type="text" name="hari" class="form-control" required><br>
                        <span>Jam Masuk</span>
                        <input type="time" name="jam_masuk" class="form-control" required><br>
                        <span>Jam Pulang</span>
                        <input type="time" name="jam_pulang" class="form-control" required><br>
                        <button class="btn btn-light" data-dismiss="modal">Batal</button>
                        <input type="submit" class="btn btn-primary" value="Tambah">
                        </div>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
