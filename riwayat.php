<?php
    session_start();
    include "koneksi.php";

    if (!isset($_SESSION['pelanggan']) OR empty($_SESSION['pelanggan']) ) {
        echo "<script>alert('Silahkan Login');</script>";
        echo "<script>location='login.php'</script>";
        exit();
    }

?>
<?php include "menu.php"; ?>
    <section class="riwayat">
        <div class="container">
            <h2><center>Riwayat Belanja <?php echo $_SESSION['pelanggan']['nama_pelanggan'] ?></center></h2>
            <?php
                echo "<center><table class='bel'>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Total</th>
                            <th>Opsi</th>
                        </tr>";
            ?>
            <?php
                        $nomor = 1;
                        $id_pelanggan = $_SESSION['pelanggan']['id_pelanggan'];
                        $ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_pelanggan='$id_pelanggan'");
                        while ($pecah = $ambil->fetch_assoc()) {
                        echo "<tr>
                            <td>" . $nomor . "</td>
                            <td>" . $pecah['tanggal_pembelian'] . "</td>
                            <td>" . $pecah['status_pembelian']  . "</td>
                            <td>Rp. " . number_format($pecah['total_pembelian']) . "</td>";
                            if ($pecah['status_pembelian'] == "lunas") {
                                echo "<td>";
                                    echo "<a href='lunas.php?id=$pecah[id_pembelian]' class='ctk'>Nota</a>";
                                    // echo "<a href='pembayaran.php?id=$pecah[id_pembelian]' class='oke'>Pembayaran</a>";
                                echo "</td>";
                            }
                            elseif ($pecah['status_pembelian'] == "Sudah mengirim bukti") {
                                echo "<td>";
                                    echo "<a href='sudah.php?id=$pecah[id_pembelian]' class='ctk'>Nota</a>";
                                    // echo "<a href='pembayaran.php?id=$pecah[id_pembelian]' class='oke'>Pembayaran</a>";
                                echo "</td>";
                            }
                            else {
                                echo "<td>";
                                    echo "<a href='nota.php?id=$pecah[id_pembelian]' class='ctk'>Nota</a>";
                                    echo "<a href='pembayaran.php?id=$pecah[id_pembelian]' class='oke'>Konfirmasi Pembayaran</a>";
                                echo "</td>";
                            }                          
                        echo "</tr>";
            ?>
                        <?php $nomor++; ?>
                        <?php } ?>
            <?php        
                echo "</table></center>";
            ?>
        </div>
    </section>
</body>
</html>