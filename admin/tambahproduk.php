<h2>Tambah Handphone</h2>

<form enctype="multipart/form-data" method="post">
    <div class="form-group">
        <label>Nama Handphone</label>
        <input type="text" class="form-control" name="namahp">
    </div>
    <div class="form-group">
        <label>Harga (Rp)</label>
        <input type="number" class="form-control" name="hargahp">
    </div>
    <div class="form-group">
        <label>Stok</label>
        <input type="number" class="form-control" name="stok">
    </div>
    <div class="form-group">
        <label>Deskripsi</label>
        <textarea name="deskripsi" row="10" cols="30" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <label>Foto</label>
        <input type="file" name="foto" class="form-control">
    </div>
    <button class="btn btn-success" name="save">Simpan</button>
</form>

<?php
    if (isset($_POST['save'])) {
        $nama   = $_FILES['foto']['name'];
        $lokasi = $_FILES['foto']['tmp_name'];
        move_uploaded_file($lokasi, "../image" . $nama);
        $koneksi->query("INSERT INTO handphone
                       (namahp, hargahp, foto, deskripsi, stok_produk)
                       VALUES('$_POST[namahp] ', '$_POST[hargahp]', '$nama', '$_POST[deskripsi]', '$_POST[stok]')");

        echo "<script>alert('Berhasil Menambah Handphone');</script>";
        echo "<script>location='index.php?halaman=handphone'</script>";
    }
?>

