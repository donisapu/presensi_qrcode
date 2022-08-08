<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form <?= $title?> Pesantren</h6>
        </div>
        <div class="card-body">
            <?php echo $this->session->flashdata('suces')?>
        <form class="form" action="<?= $action?>" method="post" enctype="multipart/form-data">
            <label>ID Pesantren</label>
            <input class="form-control" placeholder="ID Pesantren" value="<?php echo $id_pesantren;?>" name="id_pesantren" required readonly><br>
            <label>Nama Pesantren</label>
            <input class="form-control" placeholder="Nama Pesantren" value="<?php echo $nama_pesantren;?>" name="nama_pesantren" required><br>
            <label>Nama Pemilik</label>
            <input class="form-control" placeholder="Nama Pemilik" value="<?php echo $pemilik;?>" name="pemilik" required><br>
            <label>KTP</label>
            <?php if($ktp){?>
                <a target="_blank" href="<?= base_url('assets/image/ktp/'.$ktp)?>"><?= $ktp?></a>
            <?php } ?>
            <input class="form-control" type="file" accept=".jpg,.png,.jpeg,.jfif"  name="ktp">
            <input type="hidden" name="old" value="<?php echo $ktp;?>"><br>
            <label>No Telepon</label>
            <input type="number" class="form-control" placeholder="No Telepon" value="<?php echo $no_telp;?>" name="no_telp" required><br>
            <label>Email</label>
            <input type="email" class="form-control" placeholder="Email" value="<?php echo $email;?>" name="email" required><br>
            <label>Username</label>
            <input type="text" class="form-control" placeholder="Username" value="<?php echo $username;?>" name="username" required><br>
            <label>Password</label>
            <input type="password" class="form-control" placeholder="Password" value="<?php echo $password;?>" name="password" required><br>
            <hr>
            <button type="submit" class="btn btn-primary"><?= $button?></button>
            <a href="<?= site_url('admin/pesantren')?>" class="btn btn-default">Kembali</a> 
        </form>      
            </div>
        </div>
</div>



       