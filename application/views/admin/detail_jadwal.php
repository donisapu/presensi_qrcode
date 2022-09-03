<div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-purple" style="color: purple">Data Mahasiswa</h6>
                            <h6 class="m-0 font-weight-bold text-purple" style="color: purple"><?= $kelas.'/'.$mapel?></h6>
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
                        <?php $no=1; foreach ($atur->result() as $key) {
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
                        
                            <a href="<?php echo site_url('admin/hapusdetailjadwal/'.$key->id_detail_jadwal.'/'.$key->id_jadwal)?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ?')" class=" btn btn-light btn-circle btn-sm" title="Hapus"><i class="fa fa-trash"></i></a>
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
                <form role="form" method="POST" action="<?php echo site_url('admin/tambahdetailjadwal')?>">
                    <div class="modal-body">
                        <div class="form-group">
                        <span>Mahasiswa</span>
                        <select class="form-control" name="id_mahasiswa" required>
                            <option value="">-pilih-</option>
                            <?php foreach ($mahasiswa as $k ): ?>
                                <option value="<?= $k->id_mahasiswa?>"><?= $k->nim.'/'.$k->nama?></option>
                            <?php endforeach ?>
                        </select><br>
                        <input type="hidden" name="id_jadwal" value="<?= $id_jadwal?>">
                        <button class="btn btn-light" data-dismiss="modal">Batal</button>
                        <input type="submit" class="btn btn-primary" value="Tambah">
                        </div>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
