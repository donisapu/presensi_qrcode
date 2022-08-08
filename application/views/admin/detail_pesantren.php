<div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Detail Data Pesantren</h6>
                        </div>
                        <div class="card-body">
                        
                            <br>

                            <div class="table-responsive">
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID Pesantren </th>
                                            <th> : </th>
                                            <td><?php echo $id_pesantren;?></td>
                                        </tr>
                                        <tr>
                                            <th>Nama Pesantren </th>
                                            <th> : </th>
                                            <td><?php echo $nama_pesantren;?></td>
                                        </tr>
                                        <tr>
                                            <th>Nama Pemilik/PJ</th>
                                            <th> : </th>
                                            <td><?php echo $pemilik;?></td>
                                        </tr>
                                        <tr>
                                            <th>KTP</th>
                                            <th> : </th>
                                            <td><a target="_blank" href="<?= base_url('assets/image/ktp/'.$ktp)?>"><?= $ktp?></a></td>
                                        </tr>
                                        <tr>
                                            <th>No Telp</th>
                                            <th> : </th>
                                            <td><?php echo $no_telp;?></td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <th> : </th>
                                            <td><?php echo $email;?></td>
                                        </tr>
                                        <tr>
                                            <th colspan="3">
                                                <a href="<?= site_url('admin/profil_pesantren/'.$id_pesantren)?>" class="btn btn-primary">Profil Pesantren</a> | 
                                                <a href="<?= site_url('admin/data_fasilitas_pesantren/'.$id_pesantren)?>" class="btn btn-info">Fasilitas Pesantren</a> | 
                                                <a href="<?= site_url('admin/data_santri/'.$id_pesantren)?>" class="btn btn-warning">Data Santri</a> | 
                                                <a href="<?= site_url('admin/data_pengajar/'.$id_pesantren)?>" class="btn btn-success">Data Pengajar</a> | 
                                                <a href="<?= site_url('admin/pesantren')?>" class="btn btn-danger">Kembali</a>
                                            </th>
                                            
                                        </tr>
                                    </thead>
                                    
                                </table>
                            </div>
                        </div>
                    </div>

                </div>


       