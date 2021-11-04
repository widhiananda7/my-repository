<?php
	require_once "folder_login/koneksi.php";

?>
	
	<form method="post">
	NAMA
	<input type="text" name="nama_admin">
	<br>
	USERNAME
	<input type="email" name="username">
	<br>
	PASSWORD
	<input type="password" name="password">
	<br>
	<button type="submit" value="<?php if(isset($_GET['ubah'])){ echo 'ubah';} else{ echo 'simpan';} ?>" >simpan</button>
	</form>

<?php
	if(isset($_POST['simpan'])){
	$simpan=mysqli_query($koneksi, "insert into data_admin values (NULL, '$_POST[nama_admin]','$_POST[username]','$_POST[password]')");
	if($simpan){
			echo "<script>alert('berhasil'); location.href = location.href</script>";
		}else{
			echo "<script>alert('gagal'); location.href = location.href</script>";;
		}
	}
?>