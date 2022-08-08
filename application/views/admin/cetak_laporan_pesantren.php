<!DOCTYPE html>
<html>
<head>
    <title>Cetak Laporan Data Pesantren</title>
</head>
<body>
    <h2 style="text-align: center">SITAREN</h2>
    <h4 style="text-align: center">Sistem Informasi Pendataan Pesantren Daerah Cilacap</h4>
    <h3>Laporan Data Pesantren</h3>
    Keterangan:</br>
    <?php if($tgl1 !="" && $tgl2 !=""){?>
    Dari Tanggal  : <?= $tgl1;?></br>
    Sampai Tanggal : <?= $tgl2;?>
    <?php }else if($tgl1 !=""){ ?>
    Dari Tanggal  : <?= $tgl1;?>
    <?php }else if($tgl2 !=""){ ?>
    Sampai Tanggal : <?= $tgl2;?>
    <?php }else{ ?>
    Semua Data
    <?php } ?>
    </br></br>
    <table style="border-collapse: collapse;" border="1" width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Tgl Daftar</th>
                <th>ID Pesantren</th>
                <th>Nama Pesantren</th>
                <th>Nama Pemilik/PJ</th>
                <th>KTP</th>
                <th>No Telp</th>
                <th>Email</th>
                
            </tr>
        </thead>
        <tbody>
           <?php $no=1; foreach ($pesantren as $key) { if($key->status_pesantren=='Aktif'){
                ?>
            
            <tr>
            <td><?= $no++?></td>
            <td><?php echo $key->tgl_daftar;?></td>
            <td><?php echo $key->id_pesantren;?></td>
            <td><?php echo $key->nama_pesantren;?></td>
            <td><?php echo $key->pemilik;?></td>
            <td><a target="_blank" href="<?= base_url('assets/image/ktp/'.$key->ktp)?>"><?= $key->ktp?></a></td>
            <td><?php echo $key->no_telp;?></td>
            <td><?php echo $key->email;?></td>
            <?php } } ?>
        </tbody>
    </table>

<script type="text/javascript">
    window.print();
</script>
</body>
</html>