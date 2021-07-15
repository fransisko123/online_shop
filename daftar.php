<?php include "koneksi.php" ?>
<?php include "menu.php"; ?>
    <div class="kotakdaftar">
        <form method="post" >
            <h2><center> Daftar Pelanggan</center> </h2>
            <hr>                 
            <label for="nama">Nama</label>    
            <input type="text" name="nama" placeholder="Masukkan Nama" required>
            <label for="email">Email</label>                                
            <input type="email" name="email" placeholder="Masukkan Email" required>
            <label for="password">Password</label>                              
            <input type="password" name="password" placeholder="Masukkan Password" required>
            <label for="alamat">Alamat</label>
            <textarea name="alamat" placeholder="Masukkan Alamat" rows="10" required></textarea>
            <label for="telepon">Nomor Telepon</label>
            <input type="text" name="telepon" placeholder="Masukkan Nomer Telepon" required>                            
            <hr>
            <button type="submit" class="daftarbtn" name="daftar">Daftar</button>          
        </form>
        <?php
            if (isset($_POST['daftar'])) {
                $nama     = $_POST['nama'];
                $email    = $_POST['email'];
                $password = $_POST['password'];
                $alamat   = $_POST['alamat'];
                $telepon  = $_POST['telepon'];
                $ambil = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email'");
                $yangcocok = $ambil->num_rows;
                if ($yangcocok == 1) {
                    echo "<script> alert('Email sudah di gunakan'); </script>";
                    echo "<script> location='daftar.php'; </script>";
                }
                else {
                    $koneksi->query("INSERT INTO pelanggan (email_pelanggan, password_pelanggan, nama_pelanggan, telepon_pelanggan, alamat)
                    VALUES ('$email', '$password', '$nama', '$telepon', '$alamat') ");
                    echo "<script> alert('Pendaftaran Sukses, silahkan login'); </script>";
                    echo "<script> location='login.php'; </script>";
                }
            }
        ?>
    </div>
<?php include "footer.php"; ?>