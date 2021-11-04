<?php
require_once "header.php";

if(isset($_GET['ubah'])){
    $sql=mysqli_query($koneksi, "select * from toko_admin where id='$_GET[id]'");
    $data=mysqli_fetch_array($sql);
    
}
?>

   <title> Admin | Data Barang </title>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Barang</h1>
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
                <h3 class="card-title">Masukkan Data Barang</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label>Nama barang</label>
                    <input type="text" name="nama_barang" value="<?php if(isset($_GET['ubah'])){echo $data['nama_barang'];} ?>" class="form-control" placeholder="Enter nama barang">
                  </div>
                  <div class="form-group">
                    <label>Jumlah Barang</label>
                    <input type="number" name="jumlah" value="<?php if(isset($_GET['ubah'])){echo $data['jumlah'];} ?>" class="form-control" placeholder="Enter jumlah barang">
                  </div>
                  <div class="form-group">
                    <label>Keterangan</label>
                    <input type="text-area" name="keterangan" value="<?php if(isset($_GET['ubah'])){echo $data['keterangan'];} ?>" class="form-control" placeholder="Enter keterangan">
                  </div>
                  <div class="form-group">
                    <label>File Barang</label>
                    <input type="file" name="file_barang" value="<?php if(isset($_GET['ubah'])){echo $data['file_barang'];} ?>" class="form-control" placeholder="Enter file barang">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="<?php if(isset($_GET['ubah'])){ echo 'ubah'; }else{ echo 'simpan'; } ?>" class="btn btn-primary">Simpan</button>
                </div>
              </form>
            </div>
            <!-- /.card -->



            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Data Barang Tersimpan</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form>
                <div class="card-body">
                  
                              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <td>NO</td>
                                            <td>NAMA BARANG</td>
                                            <td>JUMLAH</td>
                                            <td>KETERANGAN</td>
                                            <td>FILE BARANG</td>
                                            <td>AKSI</td>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        
                                    </tfoot>
                                   <tbody>
                                    <?php
                                    $no=1;
                                    $sql=mysqli_query($koneksi,"select * from data_barang");
                                    while($data=mysqli_fetch_array($sql)){
                                    ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $data['nama_barang']; ?></td>
                                            <td><?= $data['jumlah']; ?></td>
                                            <td><?= $data['keterangan']; ?></td>
                                            <td>
                                                <a href="<?= $data['file_barang']; ?>"><img src="<?= $data['file_barang']; ?>" width="150px"></a><br>
                                                <a href="<?= $data['file_barang']; ?>"><input type="button" value="Download" class="btn btn-info"> </a>

                                            </td>
                                            <td><a href="?hapus&id=<?= $data['id_barang']; ?>"><input type="button" value="HAPUS" class="btn btn-danger"></a>
                                                <a href="?ubah&id=<?= $data['id_barang']; ?>"><input type="button" value="UBAH" class="btn btn-success"></a>
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
    //untuk mengambil data file upload, inisialisasi/deklarasi
    $namaFile = $_FILES['file_barang']['name'];
    $ukuran = $_FILES['file_barang']['size'];
    $namaSementara = $_FILES['file_barang']['tmp_name'];

    $ekstensi_diperbolehkan = array('png','jpg','jpeg');
    $x = explode('.', $namaFile);
    $ekstensi = strtolower(end($x));
   
    //untuk menentukan lokasi file upload dipindahkan
    $dirUpload = "terupload/";

    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){


    if($ukuran < 1024000){
             //pindahkan file upload
            $terUpload = move_uploaded_file($namaSementara, $dirUpload.$namaFile);
            if($terUpload) {
                $file_barang=$dirUpload.$namaFile;
                $simpan=mysqli_query($koneksi,"insert into data_barang values (NULL,'$_POST[nama_barang]','$_POST[jumlah]','$_POST[keterangan]','$file_barang')");
                if($simpan){
                    echo "<script>alert('Berhasil simpan'); location.href = location.href</script>";
                }else{
                    echo "<script>alert('Gagal simpan'); location.href = location.href</script>";
                }
            }else {
                echo "<script>alert('Gagal upload'); location.href = location.href</script>";
            }
        }else{
           echo "<script>alert('Ukuran File Terlalu Besar!'); location.href = location.href</script>"; 
        }
    }else{
        echo "<script>alert('Ekstensi File Yang Di Upload Tidak Di Perbolehkan'); location.href = location.href</script>";
    }


}elseif(isset($_GET['hapus'])){
    $hapus=mysqli_query($koneksi,"delete from data_barang where id_barang='$_GET[id]'");
    if($hapus){
        echo "<script>alert('Berhasil hapus'); location.href = location.pathname</script>";
    }else{
        echo "<script>alert('Gagal hapus'); location.href = location.pathname</script>";;
    }
}
//Ubah
elseif(isset($_POST['ubah'])){
    $simpan=mysqli_query($koneksi,"update data_barang set nama_barang='$_POST[nama_barang]', jumlah='$_POST[jumlah]', keterangan='$_POST[keterangan]',file_barang='$_POST[file_barang]' where id_barang='$_GET[id]'");
    if($simpan){
        echo "<script>alert('Berhasil Ubah'); location.href = location.pathname</script>";
    }else{
        echo "<script>alert('Gagal'); location.href = location.pathname</script>";;
    }
}
?>