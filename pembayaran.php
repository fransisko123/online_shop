<?php
    session_start();
    include "koneksi.php";

    if (!isset($_SESSION['pelanggan']) OR empty($_SESSION['pelanggan']) ) {
        echo "<script>alert('Silahkan Login');</script>";
        echo "<script>location='login.php'</script>";
        exit();
    }

    $idpem = $_GET["id"];
    $ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_pembelian='$idpem'");
    $detpem = $ambil->fetch_assoc();

    $id_pelanggan_beli = $detpem["id_pelanggan"];
    $id_pelanggan_login = $_SESSION["pelanggan"]["id_pelanggan"];

    if ($id_pelanggan_login !== $id_pelanggan_beli) {
        echo "<script>alert('Bukan Hak Anda');</script>";
        echo "<script>location='riwayat.php'</script>";
        exit();
    }
?>

<?php include "menu.php"; ?>

<div class="kotakpembayaran">
    
        
        <form method="post" enctype="multipart/form-data">
            <center>
                <h2>Konfirmasi Pembayaran</h2>
                <p>Kirim bukti pembayaran disini</p>
            </center>
            <hr>
            
            <h4>Total tagihan anda <strong>Rp. <?php echo number_format($detpem["total_pembelian"]) ?></strong></h4>
            <hr>
            
            <label for="nama">Nama Penyetor</label>
            <input type="text" name="nama" placeholder="Nama Penyetor" required>
            
            <label for="bank">Bank</label>
            <input type="text" name="bank" placeholder="Nama Bank" required>
            
            <label for="jumlah">Jumlah</label>
            <input type="number" name="jumlah" min="1" placeholder="Jumlah" required>
            
            <label for="bukti">Foto Bukti</label>
            <input type="file" name="bukti" class="btnbukti" required>
            <p><i><small> Note : Foto bukti harus JPG maksimal 2MB</small></i></p>
            
            <hr>
            <button type="submit" name="kirim" class="bayarbtn">Kirim</button>
            
        </form>
    

    <?php
        if (isset($_POST["kirim"])) {
            $namabukti = $_FILES["bukti"]["name"];
            $lokasibukti = $_FILES["bukti"]["tmp_name"];
            $namafix = date("YmdHis").$namabukti;
            move_uploaded_file($lokasibukti, "bukti_pembayaran/$namafix");

            $nama = $_POST['nama'];
            $bank = $_POST['bank'];
            $jumlah = $_POST['jumlah'];
            $tanggal = date("Y-m-d");

            $koneksi->query("INSERT INTO pembayaran(id_pembelian,nama,bank,jumlah,tanggal,bukti)
            VALUES ('$idpem','$nama','$bank','$jumlah','$tanggal','$namafix') ");

            $koneksi->query("UPDATE pembelian SET status_pembelian='Sudah mengirim bukti' WHERE id_pembelian='$idpem'");
            echo "<script>alert('Terima kasih telah mengirim bukti pembayaran');</script>";
            echo "<script>location='riwayat.php'</script>";
        }
    ?>

</div>
<?php include "footer.php"; ?>
