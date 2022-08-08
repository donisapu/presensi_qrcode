<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form <?= $title?> Pesantren</h6>
        </div>
        <div class="card-body">
        <?php echo $this->session->flashdata('suces')?>

        <form class="form" action="<?= $action?>" method="post" enctype="multipart/form-data">
            <label>Nama Pesantren</label>
            <input class="form-control" placeholder="Nama Pesantren" value="<?php echo $nama_pesantren;?>" name="nama_pesantren" required reqdonly><br>
            <label>Jumlah Pengajar</label>
            <input type="number" class="form-control" placeholder="Jumlah Pengajar" value="<?php echo $jumlah_pengajar;?>" name="jumlah_pengajar" required><br>
            <hr>
            <input type="hidden" name="id_pengajar" value="<?= $id_pengajar?>">
            <input type="hidden" name="id_pesantren" value="<?= $id_pesantren?>">
            <button type="submit" class="btn btn-primary"><?= $button?></button>
            <a class="btn btn-danger" href="<?= site_url('pesantren/detail_pesantren/'.$id_pesantren)?>">Kembali</a>
        </form>      
            </div>
        </div>
</div>



       