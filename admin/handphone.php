<h2>Halaman Handphone</h2>

<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Harga</th>
            <!-- <th>Stok</th> -->
            <th>foto</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor=1; ?>
        <?php $ambil =$koneksi->query("SELECT * FROM handphone"); ?>
        <?php while($pecah = $ambil->fetch_assoc()){ ?>
        <tr>
            <td><?php echo $nomor ?></td>
            <td><?php echo $pecah['namahp']; ?></td>
            <td><?php echo $pecah['hargahp']; ?></td>
            <!-- <td><?php echo $pecah['stok_produk']; ?></td> -->
            <td>
                <img src="../image/<?php echo $pecah['foto']; ?>" width="100">
            </td>
            <td>
                <a href="index.php?halaman=hapushp&id=<?php echo $pecah['id_hp']; ?>" class="btn btn-danger ">Hapus</a>
                <a href="index.php?halaman=ubahhp&id=<?php echo $pecah['id_hp']; ?>" class="btn btn-primary">Ubah</a>
            </td>     
        </tr>
        <?php $nomor++; ?>
        <?php } ?>
    </tbody>
</table>

<a href="index.php?halaman=tambahproduk" class="btn btn-success">Tambah Handphone +</a>