<h2>Ubah HP</h2>

<?php
    $ambil = $koneksi->query("SELECT * FROM handphone WHERE id_hp='$_GET[id]'");
    $pecah = $ambil->fetch_assoc();
?>

<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Nama Handphone</label>
        <input type="text" name="namahp" class="form-control" value="<?php echo $pecah['namahp'] ?>">
    </div>
    <div class="form-group">
        <label>Harga (Rp)</label>
        <input type="number" name="hargahp" class="form-control" value="<?php echo $pecah['hargahp'] ?>">
    </div>
    <div class="form-group">
        <label>Stok</label>
        <input type="number" name="stok" class="form-control" value="<?php echo $pecah['stok_produk'] ?>">
    </div>
    <div class="form-group">
        <img src="../image/<?php echo $pecah['foto'] ?>" width="200">
    </div>
    <div class="form-group">
        <label>Ganti Foto</label>
        <input type="file" name="foto" class="form-control">
    </div>
    <div class="form-group">
        <label>Deskripsi</label>
        <textarea name="deskripsi" rows="10" cols="30"  class="form-control">
            <?php echo $pecah['deskripsi'] ?>"
        </textarea>
    </div>
    <button class="btn btn-primary" name="ubah">Simpan</button>
</form>

<?php
    if (isset($_POST['ubah'])) {
        $namafoto   = $_FILES['foto']['name'];
        $lokasifoto = $_FILES['foto']['tmp_name'];

        if (!empty($lokasifoto)) {
            move_uploaded_file($lokasifoto, "../image/$namafoto");
            $koneksi->query("UPDATE handphone SET namahp='$_POST[namahp]',
            hargahp='$_POST[hargahp]', foto='$namafoto', deskripsi='$_POST[deskripsi]', stok_produk='$_POST[stok]'
            WHERE id_hp='$_GET[id]' ");
        }else{
            $koneksi->query("UPDATE handphone SET namahp='$_POST[namahp]',
            hargahp='$_POST[hargahp]', deskripsi='$_POST[deskripsi]', stok_produk='$_POST[stok]'
            WHERE id_hp='$_GET[id]' ");
        }
        echo "<script>alert('Data handphone telah di ubah');</script>";
        echo "<script>location='index.php?halaman=handphone'</script>";
    }
?>