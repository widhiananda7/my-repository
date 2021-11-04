<?php 
	// mengaktifkan session php
	session_start();

	$host = "localhost";
	$user = "root";
	$pass = "";
	$db = "toko";

	$koneksi = mysqli_connect($host, $user, $pass, $db);

	if(!$koneksi) {
		die("Koneksi gagal : ".mysql_connect_error());
	}
?>
