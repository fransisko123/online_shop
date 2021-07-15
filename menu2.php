<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
    <style>
        body {
    margin: 0;
    padding: 0;
    font-family: Arial, Helvetica, sans-serif;
}
.header{
    width: 100%;
    margin: auto;
    overflow: hidden;
    background-color: whitesmoke;
    text-align: center;
    background-color: #d71532;
}
.tulisan h1{
    color: white;
}
.navbar {
    z-index: 1; 
    overflow: hidden;
    background-color: #f5821f;
    margin: 0;
    padding: 0;
    position: sticky;
    top: 0;
    margin-bottom: 50px;
}
.navbar a {
    float: left;
    display: block;
    color: rgba(255,255,255,0.8);
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 17px;
    font-weight: bold;
}
.navbar a:hover {
    color: white;
}
.navbar .search-container {
    float: right;
}
.navbar input[type=text] {
    padding: 6px;
    margin-top: 8px;
    font-size: 17px;
    border: none;
}
.navbar .search-container button {
    float: right;
    padding: 6px;
    margin-top: 8px;
    margin-right: 100px;
    margin-left: 5px;
    background-color: #cc0404;
    font-size: 17px;
    border: none;
    cursor: pointer;
    font-weight: bold;
    color: rgba(255,255,255,0.8);
}
.navbar .search-container button:hover {
    background-color: #d71532;
    color: white;
}
.navbar .search-container input[type=text]:focus, button[type=submit]:focus{
    outline: none;
}
.bawah{
    margin-top: 100px;
    width: 100%;
    position: absolute;
    bottom: 0;
} 
.penutup{
    text-align: center;
    background-color: black;
    color: white;
    padding-top: 1px;
    padding-bottom: 1px;
}
img{
    margin-top: 10px;
    margin-bottom: 0;
    max-width: 200px;
    max-height: 250px;
    text-align:center;
}
a{
    text-decoration: none;

}
.oke {
    color: #fff;
    text-decoration: none;
    background-color: #369776;
    border-color: #2e8165;
    display: inline-block;
    padding: 6px 12px;
    margin-bottom: 80px;
    font-size: 14px;
    font-weight: normal;
    line-height: 1.42857143;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background-image: none;
    border: 1px solid transparent;
    border-radius: 4px;
    /* margin-right: 5px; */
    list-style: none;
}
.oke:hover,
.oke:focus,
.oke:active,
.oke.active,
.open .dropdown-toggle.oke {
    color: #fff;
    background-color: #276c54;
    border-color: #1f5643;
}
.oke:active,
.oke.active,
.open .dropdown-toggle.batal {
    background-image: none;
}
    </style>
    
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