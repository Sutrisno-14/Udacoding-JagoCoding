        <?php 
          include "koneksi.php";
        ?>
        <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah Siswa</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="nisn">NISN</label>
                    <input type="nisn" class="form-control" id="nisn" name="nisn">
                  </div>

                  <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="nama" class="form-control" id="nama" name="nama">
                  </div>

                  <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="L" value="Laki-laki">
                        <label class="form-check-label" for="L" >Laki-laki</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="P" value="Perempuan">
                        <label class="form-check-label" for="P">Perempuan</label>
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
                          <option value="<?=$kelas['id_kelas'];?>"><?= $kelas['nama_kelas']; ?></option>
                          <?php 
                            endwhile;
                          ?>
                        </select>
                  </div>

                  <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="alamat" class="form-control" id="alamat" name="alamat">
                  </div>  

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
                move_uploaded_file($lokasi, "foto_siswa/$foto");

                $koneksi->query("INSERT INTO siswa VALUES('', '$nisn', '$nama', '$jenis_kelamin', '$kelas', '$alamat', '$foto')");

                echo "
                      <script>
                          alert('Siswa berhasil ditambah');
                          document.location.href= 'index.php?halaman=siswa';
                      </script>
                ";
              }
            ?>