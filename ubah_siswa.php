<?php 
    include "koneksi.php";
    $ambil = $koneksi->query("SELECT * FROM siswa WHERE id_siswa='$_GET[id]'");
    $siswa = $ambil->fetch_assoc();
?>

        <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Ubah Siswa</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id_siswa" value="<?=$siswa['id_siswa'];?>">
                <div class="card-body">
                  <div class="form-group">
                    <label for="nisn">NISN</label>
                    <input type="nisn" class="form-control" id="nisn" name="nisn" value="<?=$siswa['nisn'];?>">
                  </div>

                  <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="nama" class="form-control" id="nama" name="nama" value="<?=$siswa['nama_siswa'];?>">
                  </div>

                  <div class="form-group">
                    <label for="js">Jenis Kelamin</label>
                    <?php $jk = $siswa['jenis_kelamin']; ?>
                    <div class="form-check">
                        <label for="L"><input type="radio" id="L" class="form-check-input" name="jenis_kelamin" value="Laki-laki" <?php echo($jk=='Laki-laki')? "checked":""; ?> >Laki-laki</label>
                    </div>
                    <div class="form-check">
                        <label for="P"><input type="radio" id="P" class="form-check-input" name="jenis_kelamin" value="Perempuan" <?php echo($jk=='Perempuan')? "checked":""; ?> >Perempuan</label>
                    </div>
                  </div>

                  <div class="form-group">
                        <label>Kelas</label>
                        <select class="form-control" name="kelas">
                          <option>Pilih Kelas</option>
                          <?php 
                            $ambil = $koneksi->query("SELECT * FROM kelas");
                            while($kelas = $ambil->fetch_assoc()):
                          ?>
                          <option value="<?=$kelas['id_kelas'];?>" <?php if($kelas['id_kelas']==$siswa['id_kelas']) {echo "selected";} ?>>
                            <?= $kelas['nama_kelas']; ?>
                          </option>
                          <?php 
                            endwhile;
                          ?>
                        </select>
                  </div>

                  <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="alamat" class="form-control" id="alamat" name="alamat" value="<?=$siswa['alamat'];?>">
                  </div>  
                  
                  <img src="foto_siswa/<?=$siswa['foto'];?>" width="150px" class="img-thumbnail">
                  <div class="form-group">
                    <label for="foto">Foto</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="foto" name="foto">
                        <label class="custom-file-label" for="foto">Choose file</label>
                      </div>
                    </div>
                  </div>
              
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                </div>
              </form>
            </div>

            <!-- Update data -->
            <?php 
              if(isset($_POST['simpan'])) {
                $nisn = $_POST['nisn'];
                $nama = $_POST['nama'];
                $jenis_kelamin = $_POST['jenis_kelamin'];
                $kelas = $_POST['kelas'];
                $alamat = $_POST['alamat'];
                //foto
                $foto = $_FILES['foto']['name'];
                $lokasi = $_FILES['foto']['tmp_name'];
                
                //jika foto di ubah
                if(!empty($lokasi)) {
                    move_uploaded_file($lokasi, "foto_siswa/$foto");
                    $koneksi->query("UPDATE siswa SET nisn='$nisn', nama_siswa='$nama', jenis_kelamin='$jenis_kelamin', id_kelas='$kelas', alamat='$alamat', foto='$foto' WHERE id_siswa='$_POST[id_siswa]'");
                }else {
                    $koneksi->query("UPDATE siswa SET nisn='$nisn', nama_siswa='$nama', jenis_kelamin='$jenis_kelamin', id_kelas='$kelas', alamat='$alamat' WHERE id_siswa='$_POST[id_siswa]'");
                }

                
                echo "
                      <script>
                          alert('Siswa berhasil diubah');
                          document.location.href= 'index.php?halaman=siswa';
                      </script>
                ";
              }
            ?>