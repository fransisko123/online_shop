<?php 
session_start();
include "koneksi.php";   
?>
<?php include "menu2.php"; ?>
    <section class="konten">
        <div class="container">
            <h1><strong>Detail Pembelian</strong></h1>
            <?php
                $ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan
                WHERE pembelian.id_pembelian='$_GET[id]'");
                $detail = $ambil->fetch_assoc();
            ?>
            <?php
            $idpelangganyangbeli = $detail['id_pelanggan'];
            $idpelangganyanglogin = $_SESSION['pelanggan']['id_pelanggan'];
            if ($idpelangganyangbeli !== $idpelangganyanglogin) {
                echo "<script>alert('Bukan Hak anda!');</script>";
                echo "<script>location='riwayat.php';</script>";
            exit();
            }
            ?>
            <div class="row">
                <div class="col-md-4">
                    <h3><b>Pembelian</b></h3>
                    <hr>
                    <strong>No.Pembelian : <?php echo $detail['id_pembelian']; ?></strong><br>
                    Tanggal : <?php echo $detail['tanggal_pembelian']; ?><br>
                    Total : Rp. <?php echo number_format($detail['total_pembelian']); ?>
                </div>
            <div class="col-md-4">
                <h3><b>Pelanggan</b></h3>
                <hr>
                <strong><?php echo $detail['nama_pelanggan']; ?></strong><br>
                <p>
                    <?php echo$detail['telepon_pelanggan']; ?><br>
                    <?php echo$detail['email_pelanggan']; ?>
                </p>
            </div>
            <div class="col-md-4">
                <h3><b>Pengiriman</b></h3>
                <hr>
                <strong><?php echo $detail['nama_kabupaten']; ?></strong><br>
                Ongkos Kirim : Rp . <?php echo number_format($detail['tarif']); ?> <br>
                Alamat : <?php echo $detail['alamat_pengiriman']; ?>
            </div>
        </div>
        <hr>
        <table class="table table-light">
            <thead class="thead-light">
                <tr>
                    <th>no</th>
                    <th>nama Handphone</th>
                    <th>Harga</th>
                    <th>jumlah</th>
                    <th>subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php $nomor=1; ?>
                <?php $ambil = $koneksi->query("SELECT * FROM pembelian_handphone WHERE id_pembelian='$_GET[id]'"); ?>
                <?php while($pecah = $ambil->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $nomor ?></td>
                    <td><?php echo $pecah['nama']; ?></td>
                    <td><?php echo "Rp ." . $pecah['harga']; ?></td>
                    <td><?php echo $pecah['jumlah']; ?></td>
                    <td><?php echo $pecah['subharga']; ?></td>  
                </tr>
                <?php $nomor++; ?>
                <?php } ?>
            </tbody>
        </table>
        <div class="row">
            <div class="col-md-7">
                <div class="alert alert-info">
                <p>
                    Silahkan Melakukan Pembayaran Rp. <?php echo number_format($detail['total_pembelian']); ?>
                    ke <br>
                    <strong>Bank Mandiri 137-001088-3276 AN. Fransisko Saverio</strong>
                </p>
                </div>
            </div>
        </div>
        <?php echo "<a href='riwayat.php' class='oke'>Oke</a>"; ?>
</section>
</body>
</html>