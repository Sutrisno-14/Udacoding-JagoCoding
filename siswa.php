<?php 
    include "koneksi.php";
?>
            <div class="card">
                <div class="card-header">
                    <h2 class="text-center">Daftar Siswa & Siswi SMA MIPA</h2>
                    <hr>
                    <a href="index.php?halaman=tambah_siswa" class="btn btn-primary">Tambah Siswa</a>
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
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $nomor =1;
                                $ambil = $koneksi->query("SELECT * FROM siswa JOIN kelas ON siswa.id_kelas=kelas.id_kelas ORDER BY nama_kelas");
                                
                                while ($siswa = $ambil->fetch_assoc()):
                            ?>
                            <tr>
                                <td><?= $nomor; ?></td>
                                <td><?= $siswa['nisn']; ?></td>
                                <td><?= $siswa['nama_siswa']; ?></td>
                                <td><?= $siswa['jenis_kelamin']; ?></td>
                                <td><?= $siswa['nama_kelas']; ?></td>
                                <td><?= $siswa['alamat']; ?></td>
                                <td>
                                    <img src="foto_siswa/<?=$siswa['foto'];?>" width="100px">
                                </td>
                                <td>
                                    <a href="index.php?halaman=ubah_siswa&id=<?=$siswa['id_siswa'];?>" class="btn btn-warning">Ubah</a>
                                    <a href="index.php?halaman=hapus_siswa&id=<?=$siswa['id_siswa'];?>" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                            <?php 
                                $nomor++;
                                endwhile;
                            ?>
                        </tbody>
                    </table>
                </div>
              <!-- /.card-body -->
            </div>