<?php 
// mengaktifkan session
session_start();
 
// menghapus semua session
session_destroy();
 
 echo "<script>alert('Anda Berhasil Logout');window.location.href = '../index.php'</script>";
// mengalihkan halaman login
//header("location:./index.php?pesan=anda berhasil logout.");
?>