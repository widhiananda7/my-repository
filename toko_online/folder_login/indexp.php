<?php
require_once "folder_login/koneksi.php";
?>
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/all.css" rel="stylesheet" type="text/css">
<style>
body {
    margin: 0;
    padding: 0;
    font-family: sans-serif;
    background: linear-gradient(to right, #b92b27, #1565c0)
}

.card {
    margin-bottom: 20px;
    border: none
}

.box {
    width: 500px;
    padding: 40px;
    position: absolute;
    top: 50%;
    left: 50%;
    background: #191919;
    ;
    text-align: center;
    transition: 0.25s;
    margin-top: 100px
}

.box input[type="text"],
.box input[type="password"] {
    border: 0;
    background: none;
    display: block;
    margin: 20px auto;
    text-align: center;
    border: 2px solid #3498db;
    padding: 10px 10px;
    width: 250px;
    outline: none;
    color: white;
    border-radius: 24px;
    transition: 0.25s
}

.box h1 {
    color: white;
    text-transform: uppercase;
    font-weight: 500
}

.box input[type="text"]:focus,
.box input[type="password"]:focus {
    width: 300px;
    border-color: #2ecc71
}

.box input[type="submit"] {
    border: 0;
    background: none;
    display: block;
    margin: 20px auto;
    text-align: center;
    border: 2px solid #2ecc71;
    padding: 14px 40px;
    outline: none;
    color: white;
    border-radius: 24px;
    transition: 0.25s;
    cursor: pointer
}

.box input[type="submit"]:hover {
    background: #2ecc71
}

.forgot {
    text-decoration: underline
}

ul.social-network {
    list-style: none;
    display: inline;
    margin-left: 0 !important;
    padding: 0
}

ul.social-network li {
    display: inline;
    margin: 0 5px
}

.social-network a.icoFacebook:hover {
    background-color: #3B5998
}

.social-network a.icoTwitter:hover {
    background-color: #33ccff
}

.social-network a.icoGoogle:hover {
    background-color: #BD3518
}

.social-network a.icoFacebook:hover i,
.social-network a.icoTwitter:hover i,
.social-network a.icoGoogle:hover i {
    color: #fff
}

a.socialIcon:hover,
.socialHoverClass {
    color: #44BCDD
}

.social-circle li a {
    display: inline-block;
    position: relative;
    margin: 0 auto 0 auto;
    border-radius: 50%;
    text-align: center;
    width: 50px;
    height: 50px;
    font-size: 20px
}

.social-circle li i {
    margin: 0;
    line-height: 50px;
    text-align: center
}

.social-circle li a:hover i,
.triggeredHover {
    transform: rotate(360deg);
    transition: all 0.2s
}

.social-circle i {
    color: #fff;
    transition: all 0.8s;
    transition: all 0.8s
}
</style>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <form action="" method="post" class="box">
                    <h1>Login</h1>
                    <p class="text-muted"> Please enter your login and password!</p> 
                    <input type="text" name="username" placeholder="Username"> 
                    <input type="password" name="password" placeholder="Password"> 
                    <input type="submit" name="login" value="Login">
                </form>
                <?php if(isset($_GET['pesan'])) {  ?>
                <label style="color:red;"><?php echo $_GET['pesan']; ?></label>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->

<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/jquery.min.js"></script>

<?php
if(isset($_POST['login'])){
    $sql=mysqli_query($koneksi,"select * from toko where username='$_POST[username]' and password='$_POST[password]'");
    $cek=mysqli_num_rows($sql);

    if($cek > 0){
        $data = mysqli_fetch_assoc($sql);
        $_SESSION['nama'] = $data['nama_admin'];
         echo "<script>alert('Berhasil Login');window.location.href = 'dashboard.php'</script>";
    }else{
         echo "<script>alert('Username/password salah'); location.href = location.href</script>";
    }    
}
?>
