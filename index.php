<?php
    session_start();
    include "koneksi.php";
?>
<?php include "menu.php"; ?>
    <!-- konten -->
    <section class="konten">
        <div class="container">
            
            <br>
            <div class="row">
                <?php 
                    if(isset($_POST['cari'])){
                        $cari = $_POST['cari'];
                        $ambil = $koneksi->query("SELECT * FROM handphone WHERE namahp like '%".$cari."%'");
                        $jum = mysqli_num_rows($ambil);
                        if ($jum < 1) { 
                ?>
                            <div class="jum">
                                <h2>Handphone tidak ditemukan</h2>
                            </div>
                <?php
                        }
                        elseif ($ambil) {
                            echo "<h1>Produk Terbaru '$cari'</h1>";
                        }
                    }else{
                        echo "<h1>Produk Terbaru</h1>";
                        $ambil = $koneksi->query("SELECT * FROM handphone");
                    }
                    while($perhp = $ambil->fetch_assoc()){
                ?>
                <div class="box">
                    <img src="image/<?php echo $perhp['foto'];?>">
                    <div class="caption">
                        <h3><?php echo $perhp['namahp'];?></h3>
                        <h5>Rp.<?php echo number_format($perhp['hargahp']); ?></h5>
                        <div class="kolom">
                            <button id="buy">
                                <a href="beli.php?id=<?php echo $perhp['id_hp']; ?>">Beli</a>
                            </button>
                            <button id="liat">
                                <a href="detail.php?id=<?php echo $perhp['id_hp']; ?>">Detail</a>
                            </button>
                        </div>
                    </div>
                </div>
                    <?php } ?>
            </div>
        </div>
    </section>
    <!-- konten -->
<?php include "footer.php"; ?>