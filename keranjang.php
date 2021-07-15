<?php
    session_start();   
    include "koneksi.php";
    if (empty($_SESSION['keranjang']) OR !isset($_SESSION['keranjang'])) {
        echo "<script>alert('Keranjang Kosong, Yuk Belanja Dulu');</script>";
        echo "<script>location='index.php';</script>";
    }
?>
<?php include "menu.php"; ?>
    <?php
        echo "<h1><center>Keranjang Belanja</center></h1>";
        echo "<center><table class='bel'>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Subtotal</th>
                <th>Aksi</th>
            </tr></center>";
    ?>
    <?php $nomor = 1; ?>
    <?php foreach ($_SESSION['keranjang'] as $id_hp => $jumlah): ?>
    <?php
        $ambil = $koneksi->query("SELECT * FROM handphone WHERE id_hp='$id_hp'"); 
        $pecah = $ambil->fetch_assoc();
        $subtotal = $pecah['hargahp'] * $jumlah;
    ?>
        <?php
            echo "<center><tr>";
                echo "<td>" . $nomor . "</td>";
                echo "<td>" . $pecah['namahp'] . "</td>";
                echo "<td>Rp. " . number_format($pecah['hargahp']) . "</td>";
                echo "<td>" . $jumlah . "</td>";
                echo "<td>Rp. " . number_format($subtotal) . "</td>";
                echo "<td>";
                    echo "<a href='hapuskeranjang.php?id=$id_hp' class='batal'>Batalkan</a>";
                echo "</td>";
            echo "</tr></center>";
        ?>
    <?php $nomor++; ?>
    <?php endforeach ?>
        <?php echo "<center></table></center>"; ?>      
        <div class="kolom">
            <button class="lanjut">
                <a href="index.php">Lanjutkan Belanja</a>
            </button>
            <button class="bayar">
                <a href="checkout.php">Checkout</a>
            </button>
        </div>
</body>
</html>