<?php
    session_start();
    $id_hp = $_GET['id'];
    unset($_SESSION['keranjang'][$id_hp]);
    echo "<script>alert('Handphone di hapus dari keranjang');</script>";
    echo "<script>location='keranjang.php';</script>";
?>