<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="header">
		<div class="tulisan">
			<h1>GADGET X</h1>
		</div>
	</div>
<!-- Navbar -->
    <div class="navbar">    
        <a href="index.php">Home</a>
        <a href="keranjang.php">Keranjang</a>
        <?php if (isset($_SESSION['pelanggan'])): ?>
            <a href="riwayat.php">Riwayat Belanja</a>
            <a href="logout.php">Logout</a>
        <?php else: ?>
            <a href="login.php">Login</a>
            <a href="daftar.php">Daftar</a>
        <?php endif ?>
        <a href="checkout.php">Checkout</a>
        <div class="search-container">
            <form action="index.php" method="POST">
            <input type="text" name="cari" placeholder="Search Handphone...">
            <button type="submit" value="Cari">Search</button></form>
        </div>   
    </div>
<!-- navbar -->