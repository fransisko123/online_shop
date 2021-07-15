<?php
    session_start();
    include "koneksi.php";
    if (!isset($_SESSION['pelanggan'])) {
        echo "<script>alert('Anda Belum Log In');</script>";
        echo "<script>location='login.php';</script>";
    }
    if (empty($_SESSION['keranjang']) OR !isset($_SESSION['keranjang'])) {
        echo "<script>alert('Belum ada barang yang anda pilih, Yuk Belanja Dulu');</script>";
        echo "<script>location='index.php';</script>";
    }
?>
<?php include "menu.php" ?>
    <section class="konten-checkout">
        <div class="container-checkout">
            <h1>Keranjang Belanja</h1>           
            <table class="table-checkout">
                <thead class="thead-checkout">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th><center>Jumlah</center></th>
                        <th><center>Subtotal</center></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor = 1; ?>
                    <?php $totalbelanja = 0; ?>
                    <?php foreach ($_SESSION['keranjang'] as $id_hp => $jumlah): ?>
                    <?php 
                        $ambil = $koneksi->query("SELECT * FROM handphone WHERE id_hp='$id_hp'"); 
                        $pecah = $ambil->fetch_assoc();
                        $subtotal = $pecah['hargahp'] * $jumlah;
                    ?>
                    <tr>
                        <td><?php echo $nomor; ?></td>
                        <td><?php echo $pecah['namahp']; ?></td>
                        <td>Rp. <?php echo number_format($pecah['hargahp']); ?></td>
                        <td><center><?php echo $jumlah; ?></center></td>
                        <td><center>Rp. <?php echo number_format($subtotal) ?></center></td>
                    </tr>
                </tbody >
                    <?php $nomor++; ?>
                    <?php $totalbelanja+=$subtotal ?>
                    <?php endforeach ?>
                <tfoot>
                    <tr>
                        <th colspan="4">Total Belanja</th>
                        <th><center>Rp. <?php echo number_format($totalbelanja) ?></center></th>
                    </tr>
                </tfoot>
            </table>
            <form method="post">
                <div class="row-checkout">
                    <input type="text" class="kolom-checkout" readonly value="<?php echo $_SESSION['pelanggan']['nama_pelanggan'] ?>">
                    <input type="text" class="kolom-checkout" readonly value="<?php echo $_SESSION['pelanggan']['telepon_pelanggan'] ?>">
                    <select name="id_ongkir" class="kolom-checkout">
                        <?php
                            $ambil = $koneksi->query("SELECT * FROM ongkir");
                            while ($perongkir = $ambil->fetch_assoc()){
                        ?>
                        <option value="<?php echo $perongkir['id_ongkir'] ?>">
                            <?php echo $perongkir['nama_kabupaten'] ?>
                            <p>Rp. <?php echo number_format($perongkir['tarif']) ?></p>
                        </option>
                        <?php } ?>
                    </select>                   
                    <div class="alamat-checkout">
                        <label><b>Alamat Lengkap Pengiriman</b></label>
                        <textarea class="kolom-checkout-alamat" name="alamat_pengiriman" placeholder="Masukan Alamat Lengkap Pengiriman(Termasuk kode pos)" rows="10" required></textarea>
                        <button class="tombol-checkout" name="checkout">Checkout</button>
                    </div>
                </div>
            </form>
            <?php
                if (isset($_POST['checkout'])) {
                    $id_pelanggan = $_SESSION['pelanggan']['id_pelanggan'];
                    $id_ongkir = $_POST['id_ongkir'];
                    $tanggal_pembelian = date("Y-m-d");
                    $alamat_pengiriman = $_POST['alamat_pengiriman'];
                    $ambil = $koneksi->query("SELECT * FROM ongkir WHERE id_ongkir='$id_ongkir'");
                    $arrayongkir = $ambil->fetch_assoc();
                    $nama_kabupaten = $arrayongkir['nama_kabupaten'];
                    $tarif = $arrayongkir['tarif'];
                    $total_pembelian = $totalbelanja + $tarif;
                    $koneksi->query("INSERT INTO pembelian (id_pelanggan, id_ongkir, tanggal_pembelian, total_pembelian, nama_kabupaten, tarif, alamat_pengiriman)
                    VALUES ('$id_pelanggan', '$id_ongkir', '$tanggal_pembelian', '$total_pembelian', '$nama_kabupaten', '$tarif','$alamat_pengiriman') ");
                    $id_pembelian_barusan = $koneksi->insert_id;


                    foreach ($_SESSION["keranjang"] as $id_hp => $jumlah) {
                        $ambil = $koneksi->query("SELECT * FROM handphone WHERE id_hp='$id_hp'");
                        $perhp = $ambil->fetch_assoc();                        
                        $nama = $perhp['namahp'];
                        $harga = $perhp['hargahp'];
                        $subharga = $perhp['hargahp'] * $jumlah;
                        $koneksi->query("INSERT INTO pembelian_handphone (id_pembelian,id_hp,nama,harga,subharga,jumlah)
                        VALUES ('$id_pembelian_barusan','$id_hp','$nama','$harga','$subharga','$jumlah') ");

                        $koneksi->query("UPDATE handphone SET stok_produk=stok_produk - $jumlah WHERE id_hp='$id_hp' ");
                    }
                    unset($_SESSION["keranjang"]);
                    echo "<script>alert('Terima Kasih, Belanja Sukses');</script>";
                    echo "<script>location='nota.php?id=$id_pembelian_barusan';</script>";       
                }
            ?>
        </div>
    </section>
<?php include "footer.php"; ?>