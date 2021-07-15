<?php
    session_start();
    $id_hp = $_GET['id'];
    if (isset($_SESSION['keranjang'][$id_hp])) {
        $_SESSION['keranjang'][$id_hp] += 1;
    }
    else{
        $_SESSION['keranjang'][$id_hp] = 1;
    }
    echo "<script>alert('Handphone telah masuk ke keranjang kamu');</script>";
    echo "<script>location='keranjang.php';</script>"
?>