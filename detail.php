<?php
    session_start();
    include "koneksi.php";

    $id_hp = $_GET['id'];

    $ambil = $koneksi->query("SELECT * FROM handphone WHERE id_hp='$id_hp'");
    $detail = $ambil->fetch_assoc();
?>
<?php include "menu2.php"; ?>
    <section class="konten">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="image/<?php echo $detail['foto']; ?>" max-width="400px" max-height="400px">
                </div>
                <div class="col-md-6">
                    <h2><?php echo $detail['namahp'] ?></h2>
                    <h4>Rp. <?php echo number_format($detail['hargahp']); ?></h4>
                    <!-- <h5>Stok : <?php echo $detail['stok_produk'] ?></h5> -->
                    <form method="post">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="number" min="1" class="form-control" name="jumlah" placeholder="Masukan Jumlah Barang" ?>
                                <div class="input-group-btn">
                                    <button class="btn btn-success" name="beli">Beli</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <?php
                        if (isset($_POST['beli'])) {
                            $jumlah = $_POST['jumlah'];
                            $_SESSION['keranjang'][$id_hp] = $jumlah;
                            echo "<script> alert('Produk Telah Keranjang Belanja'); </script>";
                            echo "<script> location='keranjang.php'; </script>";
                        }
                    ?>
                    <p><?php echo $detail['deskripsi'] ?></p>
                </div>
            </div>
        </div>
    </section>
<?php include "footer.php"; ?>