<!DOCTYPE html>
<html>
<head>
    <title>Cetak Laporan Histori Absensi</title>
</head>
<body>
    <h2 style="text-align: center">Sistem Presensi QrCode</h2>
    <h4 style="text-align: center">Universitas Amikom Purwokerto</h4>
    <h3>Histori Absensi</h3>
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
                <th>NIM</th>
                <th>Nama Mahasiswa</th>
                <th>Jam Masuk</th>
                <th>Tgl Absen</th>
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
                    <td><?php echo $key->tanggal; ?></td>
                    <td><?php echo $key->status_absen; ?></td>
                <?php } ?>
        </tbody>
    </table>

<script type="text/javascript">
    window.print();
</script>
</body>
</html>