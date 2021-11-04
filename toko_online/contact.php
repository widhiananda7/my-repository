<?php
require_once "header_contact.php";

if(isset($_GET['ubah'])){
    $sql=mysqli_query($koneksi, "select * from toko_online where id='$_GET[id]'");
    $data=mysqli_fetch_array($sql);
    
}
?>
	
	<!-- Breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bread-inner">
						<ul class="bread-list">
							<li><a href="index1.html">Home<i class="ti-arrow-right"></i></a></li>
							<li class="active"><a href="blog-single.html">Contact</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Breadcrumbs -->
  
	<!-- Start Contact -->
	<section id="contact-us" class="contact-us section">
		<div class="container">
				<div class="contact-head">
					<div class="row">
						<div class="col-lg-8 col-12">
							<div class="form-main">
								<div class="title">
									<h4>Get in touch</h4>
									<h3>Daftar</h3>
								</div>
								<form class="form" method="post">
									<div class="row">
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>Tanggal Daftar</label>
               								    <input type="date" name="tanggal_daftar" values="<?php if(isset($_GET['ubah'])){echo $data['tanggal_daftar'];} ?>" class="form-control" placeholder="Enter Date" required>
											</div>
										</div>
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>Nama Pembeli</label>
                   								<input type="text" name="nama_pembeli" value="<?php if(isset($_GET['ubah'])){echo $data['nama_pembeli'];} ?>" class="form-control" placeholder="Enter name" required>
											</div>
										</div>
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>Email Address</label>
                    							<input type="email" name="email" value="<?php if(isset($_GET['ubah'])){echo $data['email'];} ?>" class="form-control" placeholder="Enter email" required>
											</div>	
										</div>
										<div class="col-lg-6 col-12">
											<div class="form-group">
										 		<label>Password</label>
                    							<input type="password" name="password" value="<?php if(isset($_GET['ubah'])){echo $data['password'];} ?>" class="form-control" placeholder="Password" required>
                    						</div>
                    					</div>
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>No HP</label>
                   								<input type="number" name="no_hp" value="<?php if(isset($_GET['ubah'])){echo $data['no_hp'];} ?>" class="form-control" placeholder="No HP" required>
											</div>	
										</div>
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>Alamat</label>
												<input type="text" name="alamat" value="<?php if(isset($_GET['ubah'])){echo $data['alamat'];} ?>" class="form-control" placeholder="Alamat" required>
											</div>	
										</div>
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>Kota</label>
                    							<input type="text" name="kota" value="<?php if(isset($_GET['ubah'])){echo $data['kota'];} ?>" class="form-control" placeholder="Enter Kota" required>
											</div>	
										</div>

										<div class="col-12">
											<div class="form-group button">
												<button type="submit" name="<?php if(isset($_GET['ubah'])){ echo 'ubah'; }else{ echo 'simpan'; } ?>" class="btn btn-primary">Simpan</button>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
						<div class="col-lg-4 col-12">
							<div class="single-head">
								<div class="single-info">
									<i class="fa fa-phone"></i>
									<h4 class="title">Call us Now:</h4>
									<ul>
										<li>+123 456-789-1120</li>
										<li>+522 672-452-1120</li>
									</ul>
								</div>
								<div class="single-info">
									<i class="fa fa-envelope-open"></i>
									<h4 class="title">Email:</h4>
									<ul>
										<li><a href="mailto:info@yourwebsite.com">info@yourwebsite.com</a></li>
										<li><a href="mailto:info@yourwebsite.com">support@yourwebsite.com</a></li>
									</ul>
								</div>
								<div class="single-info">
									<i class="fa fa-location-arrow"></i>
									<h4 class="title">Our Address:</h4>
									<ul>
										<li>KA-62/1, Travel Agency, 45 Grand Central Terminal, New York.</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
	</section>
	<!--/ End Contact -->
	
	<!-- Map Section -->
	<div class="map-section">
		<div id="myMap"></div>
	</div>
	<!--/ End Map Section -->
	
	<!-- Start Shop Newsletter  -->
	<section class="shop-newsletter section">
		<div class="container">
			<div class="inner-top">
				<div class="row">
					<div class="col-lg-8 offset-lg-2 col-12">
						<!-- Start Newsletter Inner -->
						<div class="inner">
							<h4>Newsletter</h4>
							<p> Subscribe to our newsletter and get <span>10%</span> off your first purchase</p>
							<form action="mail/mail.php" method="get" target="_blank" class="newsletter-inner">
								<input name="EMAIL" placeholder="Your email address" required="" type="email">
								<button class="btn">Subscribe</button>
							</form>
						</div>
						<!-- End Newsletter Inner -->
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Shop Newsletter -->
	
<?php
require_once "footer_contact.php";

if(isset($_POST['simpan'])){
    $simpan=mysqli_query($koneksi,"insert into pembeli values (NULL,'$_POST[tanggal_daftar]','$_POST[nama_pembeli]','$_POST[email]','$_POST[password]','$_POST[no_hp]','$_POST[alamat]','$_POST[kota]','Tidak Aktif')");
    if($simpan){
        echo "<script>alert('Berhasil'); location.href = location.href</script>";
    }else{
        echo "<script>alert('Gagal'); location.href = location.href</script>";;
    }
}elseif(isset($_GET['hapus'])){
    $hapus=mysqli_query($koneksi,"delete from pembeli where id_pembeli='$_GET[id]'");
    if($hapus){
        echo "<script>alert('Berhasil hapus'); location.href = location.pathname</script>";
    }else{
        echo "<script>alert('Gagal hapus'); location.href = location.pathname</script>";;
    }
}
//Ubah
elseif(isset($_POST['ubah'])){
    $simpan=mysqli_query($koneksi,"update pembeli set tanggal_daftrar='$_POST[tanggal_daftar]', nama_pembeli='$_POST[nama_pembeli]', email='$_POST[email]', password='$_POST[password]', no_hp='$_POST[no_hp]', alamat='$_POST[alamat]', kota='$_POST[kota]' where id_pembeli='$_GET[id]'");
    if($simpan){
        echo "<script>alert('Berhasil Ubah'); location.href = location.pathname</script>";
    }else{
        echo "<script>alert('Gagal'); location.href = location.pathname</script>";;
    }
}

?>
 
