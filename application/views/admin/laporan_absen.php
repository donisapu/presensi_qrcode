<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Laporan Data Absensi</h6>
        </div>
        <div class="card-body">
            <form style="padding-bottom:20px;" class="form-inline" method="get" action="<?php echo site_url('admin/laporan_absen'); ?>" style="padding-bottom:20px;">
                <!-- <div class="col-md-4">
                    <div class="form-group">
                        <span>Dari Tanggal</span><br>
                        <input type="date" name="tgl1" class="form-control" value="<?php echo $tgl1; ?>">

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <span>Sampai Tanggal</span><br>
                        <input type="date" name="tgl2" class="form-control" value="<?php echo $tgl2; ?>">

                    </div>
                </div> -->

                <div class="col-md-4">
                    <!-- <button type="submit" class="btn btn-info" style="margin-right:10px;">Pilih</button> -->
                    <!-- <a href="<?php echo site_url('admin/laporan_absen') ?>" class="btn btn-success ">
                        <font color="white">Refresh</font>
                    </a> -->
                    <a href="<?php echo site_url('admin/cetak_laporan_absen?tgl1=' . $tgl1 . '&tgl2=' . $tgl2); ?>" target="_blank" class="btn btn-warning">
                        <font color="white">Print PDF</font>
                    </a>
                </div>
            </form>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIM</th>
                            <th>Nama Mahasiswa</th>
                            <th>Jam Masuk</th>
                            <th>Status Absen</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $no = 1;
                        foreach ($absen as $key) { ?>

                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?php echo $key->nim; ?></td>
                                <td><?php echo $key->nama; ?></td>
                                <td><?php echo $key->jam_absen; ?></td>
                                <td>
                                    <?php if($key->jam_absen < date('Y-m-d, H:i:s')){
                                        echo "On Time";
                                    }else{
                                        echo "Terlambat";
                                    }
                                    ?>
                                </td>
                            <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>