<div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-purple" style="color: purple">Data Jadwal</h6>
                        </div>
                        <div class="card-body">
                        <?php echo $this->session->flashdata('suces')?>
                            <br>
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
                            <th>Opsi</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                        <?php $no=1; foreach ($jadwal->result() as $key) {
                            ?>
                        <tr>
                        <th><?php echo $no++;?></th>
                        <td><?php echo $key->nama_kelas;?></td>
                        <td><?php echo $key->nama_mapel;?></td>
                        <td><?php echo $key->hari;?></td>
                        <td><?php echo $key->jam_masuk;?></td>
                        <td><?php echo $key->jam_pulang;?></td>
                        <td>
                            <a href="<?php echo site_url('mahasiswa/absen/'.$key->id_jadwal)?>" class=" btn btn-primary btn-sm" title="Absen Sekarang!">Absen</a>
                        </td>
                        
                        </tr>
                        <?php } ?>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
