<h2>Halaman Pelanggan</h2>

<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>email</th>
            <th>telepon</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor=1; ?>
        <?php $ambil = $koneksi->query("SELECT * FROM pelanggan"); ?>
        <?php while($pecah = $ambil->fetch_assoc()){ ?>
        <tr>
            <td><?php echo $nomor ?></td>
            <td><?php echo $pecah['nama_pelanggan']; ?></td>
            <td><?php echo $pecah['email_pelanggan']; ?></td>
            <td><?php echo $pecah['telepon_pelanggan']; ?></td>
            <td>
                <a href="index.php?halaman=hapuspelanggan&id=<?php echo $pecah['id_pelanggan']; ?>" class="btn btn-danger ">Hapus</a>
                <a href="index.php?halaman=ubahpelanggan&id=<?php echo $pecah['id_pelanggan']; ?>" class="btn btn-primary">Ubah</a>
            </td>     
        </tr>
        <?php $nomor++; ?>
        <?php } ?>
    </tbody>
</table>