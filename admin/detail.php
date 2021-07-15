<h2>Detail Pembelian</h2>

<?php
    $ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan
    WHERE pembelian.id_pembelian='$_GET[id]'");

    $detail = $ambil->fetch_assoc();
?>

<strong><?php echo $detail['nama_pelanggan']; ?></strong><br>
<p>
    <?php echo$detail['telepon_pelanggan']; ?><br>
    <?php echo$detail['email_pelanggan']; ?>
</p>

<p>
    tanggal : <?php echo $detail['tanggal_pembelian']; ?><br>
    Total : <?php echo $detail['total_pembelian']; ?>
</p>

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
        <?php $ambil = $koneksi->query("SELECT *FROM pembelian_handphone JOIN handphone ON pembelian_handphone.id_hp=handphone.id_hp 
        WHERE pembelian_handphone.id_pembelian='$_GET[id]'"); ?>
        <?php while($pecah = $ambil->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $nomor ?></td>
            <td><?php echo $pecah['namahp']; ?></td>
            <td><?php echo $pecah['hargahp']; ?></td>
            <td><?php echo $pecah['jumlah']; ?></td>
            <td>
                <?php echo $pecah['hargahp'] * $pecah['jumlah'] ?>
            </td>   
        </tr>
        <?php $nomor++; ?>
        <?php } ?>
    </tbody>
</table>