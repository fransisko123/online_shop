<?php
    session_start();
    session_destroy();
    echo "<script>alert('Anda Telah Log Out');</script>";
    echo "<script>location='login.php'</script>";
?>