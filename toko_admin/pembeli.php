<?php
require_once "header.php";

if(isset($_GET['ubah'])){
    $sql=mysqli_query($koneksi, "select * from toko_admin where id='$_GET[id]'");
    $data=mysqli_fetch_array($sql);
    
}
?>

   <title> Admin | Data Pembeli </title>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Pembeli</h1>
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
                <h3 class="card-title">Masukkan Data Pembeli</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label>Tanggal Daftar</label>
                    <input type="date" name="tanggal_daftar" values="<?php if(isset($_GET['ubah'])){echo $data['tanggal_daftar'];} ?>" class="form-control" placeholder="Enter Date" required>
                  </div>
                  <div class="form-group">
                    <label>Nama Pembeli</label>
                    <input type="text" name="nama_pembeli" value="<?php if(isset($_GET['ubah'])){echo $data['nama_pembeli'];} ?>" class="form-control" placeholder="Enter name" required>
                  </div>
                  <div class="form-group">
                    <label>Email Address</label>
                    <input type="email" name="email" value="<?php if(isset($_GET['ubah'])){echo $data['email'];} ?>" class="form-control" placeholder="Enter email" required>
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" value="<?php if(isset($_GET['ubah'])){echo $data['password'];} ?>" class="form-control" placeholder="Password" required>
                  </div>
                  <div class="form-group">
                    <label>No HP</label>
                    <input type="number" name="no_hp" value="<?php if(isset($_GET['ubah'])){echo $data['no_hp'];} ?>" class="form-control" placeholder="No HP" required>
                  </div>
                  <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" name="alamat" value="<?php if(isset($_GET['ubah'])){echo $data['alamat'];} ?>" class="form-control" placeholder="Alamat" required>
                  </div>
                  <div class="form-group">
                    <label>Kota</label>
                    <input type="text" name="kota" value="<?php if(isset($_GET['ubah'])){echo $data['kota'];} ?>" class="form-control" placeholder="Enter Kota" required>
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
                <h3 class="card-title">Data Pembeli Tersimpan</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form>
                <div class="card-body">
                  
                              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <td>NO</td>
                                            <td>TGL DAFTAR</td>
                                            <td>NAMA PEMBELI</td>
                                            <td>USERNAME</td>
                                            <td>PASSWORD</td>
                                            <td>NO HP</td>
                                            <td>ALAMAT</td>
                                            <td>KOTA</td>
                                            <td>AKSI</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $no=1;
                                    $sql=mysqli_query($koneksi,"select * from pembeli");
                                    while($data=mysqli_fetch_array($sql)){
                                    ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $data['tanggal_daftar']; ?></td>
                                            <td><?= $data['nama_pembeli']; ?></td>
                                            <td><?= $data['email']; ?></td>
                                            <td><?= $data['password']; ?></td>
                                            <td><?= $data['no_hp']; ?></td>
                                            <td><?= $data['alamat']; ?></td>
                                            <td><?= $data['kota']; ?></td>
                                            <td><a href="?hapus&id=<?= $data['id_pembeli']; ?>"><input type="button" value="HAPUS" class="btn btn-danger"></a>
                                                <a href="?ubah&id=<?= $data['id_pembeli']; ?>"><input type="button" value="UBAH" class="btn btn-success"></a>
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
    $simpan=mysqli_query($koneksi,"insert into pembeli values (NULL,'$_POST[tanggal_daftar]','$_POST[nama_pembeli]','$_POST[email]','$_POST[password]','$_POST[no_hp]','$_POST[alamat]','$_POST[kota]')");
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