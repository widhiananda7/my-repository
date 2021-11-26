<?php
 require_once "folder_login/koneksi.php";
 ?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Login Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="folder_login/loginstyle.css">
</head>

<body>
    <div class="login-dark">
        <div>
                <h1 style="text-align: center;"> </h1>
        </div>
        <form method="post">
            <div class="illustration"><h3>Locked >,<</h3><i class="icon ion-ios-locked-outline"></i></div>
            <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Email"></div>
            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password"></div>
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit" name="login">Log In</button></div><a href="#" class="forgot">Forgot your email or password?</a></form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php
if(isset($_POST['login'])){
    $sql=mysqli_query($koneksi,"select * from pembeli where email='$_POST[email]' and password='$_POST[password]'");
    $cek=mysqli_num_rows($sql);

    if($cek > 0){
        $data = mysqli_fetch_assoc($sql);
        $_SESSION['id_pembeli'] = $data['id_pembeli'];
        $_SESSION['nama'] = $data['nama_pembeli'];
         echo "<script>alert('Berhasil Login');window.location.href = 'profil.php'</script>";
    }else{
         echo "<script>alert('Username/password salah'); location.href = location.href</script>";
    }    
}
?>