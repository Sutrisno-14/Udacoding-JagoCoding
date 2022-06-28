<?php 
    include "koneksi.php";
?>
            <div class="card">
                <div class="card-header">
                    <h2 class="text-center">Daftar Siswa & Siswi Kelas X MIPA</h2>
                    <hr>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NISN</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Kelas</th>
                                <th>Alamat</th>
                                <th>Foto</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php

                                $no=1;
                                $ambil = $koneksi->query("SELECT * FROM siswa WHERE id_kelas='$_GET[id]' ORDER BY nama_siswa ASC");
                                while($siswa=$ambil->fetch_assoc()):
                                ?>
                                <td><?=$no;?></td>
                                
                                <td><?=$siswa['nisn'];?></td>
                                <td><?=$siswa['nama_siswa'];?></td>
                                <td>
                                    <?php
                                        echo $siswa['jenis_kelamin'];
                                    ?>
                                </td>
                                <td>
                                    <?php echo ($siswa['id_kelas'] == 1)? "X MIPA":""; ?>
                                </td>
                                <td><?=$siswa['alamat'];?></td>
                                <td>
                                    <img src="foto_siswa/<?=$siswa['foto'];?>" width="100px">
                                </td>
                                </tr>
                                <?php
                                $no++;    
                                endwhile;
                                ?>  
                        </tbody>
                    </table>
                </div>
              <!-- /.card-body -->
            </div>