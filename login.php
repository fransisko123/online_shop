<?php
    session_start();
    include "koneksi.php";
?>
<?php include "menu.php"; ?>
    <div class="login">
		<h2><center>LOGIN</center></h2>
		<form method="POST">
            <div class="kolomlogin">
                <input type="email" name="email_pelanggan" placeholder="Email" required>
            </div>
            <div class="kolomlogin">
                <input type="password" name="password_pelanggan" placeholder="Password" required>
            </div>
            <div class="kolomlogin">
                <input type="submit" value="Log In" name="login">
            </div>
        </form>
	</div>
    <?php
        if (isset($_POST['login'])) {
            $ambil = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan='$_POST[email_pelanggan]' AND password_pelanggan='$_POST[password_pelanggan]'");
            $yangcocok = $ambil->num_rows;
            if ($yangcocok == 1) {
                $_SESSION['pelanggan'] = $ambil->fetch_assoc();
                echo "<script>alert('Berhasil Log In');</script>";
                if (isset($_SESSION['keranjang']) OR !empty($_SESSION['keranjang'])) {
                    echo "<script>location='checkout.php'</script>";
                }
                else {
                    echo "<script>location='riwayat.php'</script>";
                }                
            }
            else {
                echo "<script>alert('Gagal Log In');</script>";
                echo "<script>location='login.php'</script>";
            }
        }
    ?>
<?php include "footer.php"; ?>