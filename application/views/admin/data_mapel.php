<div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Mapel</h6>
                        </div>
                        <div class="card-body">
                        <?php echo $this->session->flashdata('suces')?>
                            <br>

                <button type="button"  data-toggle="modal" data-target="#tambah" class="btn btn-light btn-icon-split">
                    <span class="icon text-gray-600">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Tambah</span>
                </button> 
                <br><br>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                            <th>No</th>
                            <th>Nama Mapel</th>
                            <th>Opsi</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                        <?php $no=1; foreach ($mapel->result() as $key) {
                            ?>
                        <tr>
                        <th><?php echo $no++;?></th>
                        <td><?php echo $key->nama_mapel;?></td>
                                               
                        <td>
                        
                            <button type="button" class="btn btn-light btn-sm btn-circle" data-toggle="modal" data-target="#edit<?= $key->id_mapel?>" title="Edit"><i class="fa fa-pen"></i></button>
                            <div id="edit<?= $key->id_mapel?>" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            
                                            <h4 class="modal-title">Edit Data Mapel</h4>
                                            <button type="button" class="close" data-dismiss="modal">x</button>
                                        </div>
                                        <form role="form" method="POST" action="<?php echo site_url('admin/editmapel/'.$key->id_mapel)?>">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                <span>Nama Mapel</span>
                                                <input class="form-control" type="text" placeholder="text" name="nama_mapel" value="<?= $key->nama_mapel?>" required><br>
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
                            <a href="<?php echo site_url('admin/hapusmapel/'.$key->id_mapel)?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ?')" class=" btn btn-light btn-circle btn-sm" title="Hapus"><i class="fa fa-trash"></i></a>
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
                    
                    <h4 class="modal-title">Tambah Data Mapel</h4>
                    <button type="button" class="close" data-dismiss="modal">x</button>
                </div>
                <form role="form" method="POST" action="<?php echo site_url('admin/tambahmapel')?>">
                    <div class="modal-body">
                        <div class="form-group">
                        <span>Nama Mapel</span>
                        <input class="form-control" type="text" placeholder="text" name="nama_mapel" required><br>
                        <button class="btn btn-light" data-dismiss="modal">Batal</button>
                        <input type="submit" class="btn btn-primary" value="Tambah">
                        </div>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
