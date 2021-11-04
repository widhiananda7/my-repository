<?php
require_once "header.php";

if(isset($_GET['ubah'])){
    $sql=mysqli_query($koneksi, "select * from toko_admin where id='$_GET[id]'");
    $data=mysqli_fetch_array($sql);
    
}
?>

    <title> Admin | Data Admin </title>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Admin</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


<!------------------------------------------------------------------------------------------------------------------------------------------->
<?php 
/**
    <!-- Main content -->
     <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
*/ 
?>
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Masukkan Data Admin</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label>Nama Admin</label>
                    <input type="text" name="nama_admin" value="<?php if(isset($_GET['ubah'])){echo $data['nama_admin'];} ?>" class="form-control" placeholder="Enter name">
                  </div>
                  <div class="form-group">
                    <label>Email address</label>
                    <input type="email" name="username" value="<?php if(isset($_GET['ubah'])){echo $data['username'];} ?>" class="form-control" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" value="<?php if(isset($_GET['ubah'])){echo $data['password'];} ?>" class="form-control" placeholder="Password">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="<?php if(isset($_GET['ubah'])){ echo 'ubah'; }else{ echo 'simpan'; } ?>" class="btn btn-primary">Simpan</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            <br>
            
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Data Admin Tersimpan</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form>
                <div class="card-body">
                  
                              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <td>NO</td>
                                            <td>NAMA ADMIN</td>
                                            <td>FOTO</td>
                                            <td>USERNAME</td>
                                            <td>PASSWORD</td>
                                            <td>AUTHORITY</td>
                                            <td>AKSI</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $no=1;
                                    $sql=mysqli_query($koneksi,"select * from data_admin");
                                    while($data=mysqli_fetch_array($sql)){
                                    ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $data['nama_admin']; ?></td>
                                            <td><a href="<?= $data['foto']; ?>"><image src="<?= $data['foto']; ?>" width="150px"></a></td>
                                            <td><?= $data['username']; ?></td>
                                            <td><?= $data['password']; ?></td>
                                            <td><?= $data['authority']; ?></td>
                                            <td><a href="?hapus&id=<?= $data['id']; ?>"><input type="button" value="HAPUS" class="btn btn-danger"></a>
                                                <a href="?ubah&id=<?= $data['id']; ?>"><input type="button" value="UBAH" class="btn btn-success"></a>
                                            </td>
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  
                  <!-- -->

                </div>
              </form>
            </div>
            <!-- /.card -->

<!------------------------------------------------------------------------------------------------------------------------------------------->


<?php
require_once "footer.php";

if(isset($_POST['simpan'])){
    $simpan=mysqli_query($koneksi,"insert into data_admin values (NULL,'$_POST[nama_admin]','$_POST[username]','$_POST[password]')");
    if($simpan){
        echo "<script>alert('Berhasil'); location.href = location.href</script>";
    }else{
        echo "<script>alert('Gagal'); location.href = location.href</script>";;
    }
}elseif(isset($_GET['hapus'])){
    $hapus=mysqli_query($koneksi,"delete from data_admin where id='$_GET[id]'");
    if($hapus){
        echo "<script>alert('Berhasil hapus'); location.href = location.pathname</script>";
    }else{
        echo "<script>alert('Gagal hapus'); location.href = location.pathname</script>";;
    }
}
//Ubah
elseif(isset($_POST['ubah'])){
    $simpan=mysqli_query($koneksi,"update data_admin set nama_admin='$_POST[nama_admin]', username='$_POST[username]', password='$_POST[password]' where id_admin='$_SESSION[id_admin]'");
    if($simpan){
        echo "<script>alert('Berhasil Ubah'); location.href = location.pathname</script>";
    }else{
        echo "<script>alert('Gagal'); location.href = location.pathname</script>";;
    }
}
?>