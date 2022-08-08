<div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Absen Masuk</h6>
                        </div>
                        <div class="card-body">
                        <?php 
                        function getDay($date){
                         $datetime = DateTime::createFromFormat('Y-m-d', $date);
                         return $datetime->format('l');
                        }

                        function getHari($date){
                         $day=getDay($date);
                         switch ($day) {
                          case 'Sunday':
                           $hari = 'Minggu';
                           break;
                          case 'Monday':
                           $hari = 'Senin';
                           break;
                          case 'Tuesday':
                           $hari = 'Selasa';
                           break;
                          case 'Wednesday':
                           $hari = 'Rabu';
                           break;
                          case 'Thursday':
                           $hari = 'Kamis';
                           break;
                          case 'Friday':
                           $hari = 'Jumat';
                           break;
                          case 'Saturday':
                           $hari = 'Sabtu';
                           break;
                          default:
                           $hari = 'Tidak ada';
                           break;
                         }
                         return $hari;
                        }
                        
                        $t = date('H:i:s');
                        $d = gethari(date('Y-m-d'));
                        $tutup = date('Y-m-d H:i:s', strtotime($jadwal->jam_masuk) + (60 * 60));

                        if($jadwal->hari != $d && $jadwal->jam_masuk < $t){?>
                            <div class="row">
                                <div class="col-md-12" style="text-align: center"> 
                                    <p>Maaf tidak ada jadwal perkuliahan</p>
                                    <h3><b>Silakan Cek Jadwal Anda</b></h3>
                                    Jam: <?= $d.', <span id="clock"></span>'?> 
                                </div>
                            </div>
                        <?php }else if($jadwal->hari == $d && $tutup == $t){?>
                                <div class="col-md-12" style="text-align: center"> 
                                    <p>Maaf perkuliahan sudah selesai</p>
                                    <h3><b>Terimakasih</b></h3>
                                    Jam: <?= $d.', <span id="clock"></span>'?>
                                </div>
                        <?php }else{?>
                            <div class="row">
                                <div class="col-md-12" style="text-align: center"> 
                                    <p>Absen</p>
                                    <h3><b>Scan Disini</b></h3>
                                    <img src="<?= base_url('assets/qrcodeimg/'.$qrcode)?>"><hr>
                                    <span>Jam: <?= $d.', <span id="clock"></span>'?></span>
                                    <?php if($jadwal->jam_masuk < $t){?>
                                    <span style="color: red">Terlambat</span>
                                    <?php }?>
                                </div>
                            </div>
                            <hr>
                            <div class="table-responsive">
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>NIM </th>
                                            <th> : </th>
                                            <td><?php echo $nim;?></td>
                                        </tr>
                                        <tr>
                                            <th>Nama Mahasiswa </th>
                                            <th> : </th>
                                            <td><?php echo $nama;?></td>
                                        </tr>
                                        <tr>
                                            <th>Makul </th>
                                            <th> : </th>
                                            <td><?php echo $jadwal->nama_mapel;?></td>
                                        </tr>
                                        <tr>
                                            <th>Jadwal </th>
                                            <th> : </th>
                                            <td><?php echo $jadwal->hari.'/'.$jadwal->jam_masuk;?></td>
                                        </tr>
                                    </thead> 
                                </table>
                                
                            </div>
                        <?php }?>
                            
                        </div>
                    </div>

                </div>


       