<?php 
    include "koneksi.php";

    $ambil = $koneksi->query("SELECT * FROM siswa WHERE id_siswa='$_GET[id]'");
    $siswa = $ambil->fetch_assoc();
    $foto = $siswa['foto'];

    if(file_exists("foto_siswa/$foto")) {
        unlink("foto_siswa/$foto");
    }
    //
    $koneksi->query("DELETE FROM siswa WHERE id_siswa='$_GET[id]'");

    echo "
        <script>
            alert('Siswa berhasil diubah');
            document.location.href= 'index.php?halaman=siswa';
        </script>
    ";
?>