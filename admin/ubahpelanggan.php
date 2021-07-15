<h2>Ubah Data Pelanggan</h2>

<?php
    $ambil = $koneksi->query("SELECT * FROM pelanggan WHERE id_pelanggan='$_GET[id]'");
    $pecah = $ambil->fetch_assoc();
?>

<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Nama Pelanggan</label>
        <input type="text" name="nama_pelanggan" class="form-control" value="<?php echo $pecah['nama_pelanggan'] ?>">
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="email" name="email_pelanggan" class="form-control" value="<?php echo $pecah['email_pelanggan'] ?>">
    </div>
    <div class="form-group">
        <label>Telepon</label>
        <input type="text" name="telepon_pelanggan" class="form-control" value="<?php echo $pecah['telepon_pelanggan'] ?>">
    </div>
    
    <button class="btn btn-primary" name="ubah">Simpan</button>
</form>

<?php
    if (isset($_POST['ubah'])) {

        $koneksi->query("UPDATE pelanggan SET nama_pelanggan='$_POST[nama_pelanggan]',
        email_pelanggan='$_POST[email_pelanggan]', telepon_pelanggan='$_POST[telepon_pelanggan]'
         WHERE id_pelanggan='$_GET[id]' ");
        echo "<script>alert('Data handphone telah di ubah');</script>";
        echo "<script>location='index.php?halaman=pelanggan'</script>";
    }
?>