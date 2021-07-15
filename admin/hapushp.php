<?php
    $ambil = $koneksi->query("SELECT * FROM handphone WHERE id_hp='$_GET[id]'");
    $pecah = $ambil->fetch_assoc();
    $foto = $pecah['foto'];

    if (file_exists("../image/$foto")) {
        unlink("../image/$foto");
    }

    $koneksi->query("DELETE FROM handphone WHERE id_hp='$_GET[id]'");

    echo "<script>alert('Handphone Terhapus');</script>";
    echo "<script>location='index.php?halaman=handphone'</script>";
?>