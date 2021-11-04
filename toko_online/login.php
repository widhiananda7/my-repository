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
									<h3>Login</h3>
								</div>
								<form class="form" method="post">
									<div class="row">
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>Email Address</label>
                    							<input type="email" name="email" class="form-control" placeholder="Enter email" required>
											</div>	
										</div>
										<div class="col-lg-6 col-12">
											<div class="form-group">
										 		<label>Password</label>
                    							<input type="password" name="password" class="form-control" placeholder="Password" required>
                    						</div>
                    					</div>
										<div class="col-12">
											<div class="form-group button">
												<div class="form-group"><button class="btn btn-primary btn-block" type="submit" name="login">Log In</button>
												</div>
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

if(isset($_POST['login'])){
    $sql=mysqli_query($koneksi,"select * from pembeli where email='$_POST[email]' and password='$_POST[password]'");
    $cek=mysqli_num_rows($sql);

    if($cek > 0){
        $data = mysqli_fetch_assoc($sql);
        $_SESSION['id_pembeli'] = $data['id_pembeli'];
        $_SESSION['nama'] = $data['nama_pembeli'];
         echo "<script>alert('Berhasil Login');window.location.href = 'index.php'</script>";
    }else{
         echo "<script>alert('Username/password salah'); location.href = location.href</script>";
    }    
}
?>