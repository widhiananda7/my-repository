<?php
require_once "header.php";

if(isset($_GET['ubah'])){
    $sql=mysqli_query($koneksi, "select * from toko_online where id='$_GET[id]'");
    $data=mysqli_fetch_array($sql);
    
}
?>

<title> Admin | Data Pembeli </title>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="../../dist/img/user4-128x128.jpg"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">Nina Mcintire</h3>

                <p class="text-muted text-center">Software Engineer</p>

                <ul class="list-group list-group-unbordered mb-3">
                  
                  <li class="list-group-item">
                    <input type="file" class="form-control">
                  </li>
                </ul>

                <a href="#" class="btn btn-primary btn-block"><b>Ubah Foto</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About Me</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Education</strong>

                <p class="text-muted">
                  B.S. in Computer Science from the University of Tennessee at Knoxville
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                <p class="text-muted">Malibu, California</p>

                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                <p class="text-muted">
                  <span class="tag tag-danger">UI Design</span>
                  <span class="tag tag-success">Coding</span>
                  <span class="tag tag-info">Javascript</span>
                  <span class="tag tag-warning">PHP</span>
                  <span class="tag tag-primary">Node.js</span>
                </p>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card card-primary">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <h3 class="card-title">Data Pembeli</h3>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">

                 
                  <div class="tab-pane" id="settings">
                    <form class="form-horizontal" method="post">
                      <?php
                        $sql=mysqli_query($koneksi,"select * from pembeli where id_pembeli='$_SESSION[id_pembeli]'");
                        while($data=mysqli_fetch_array($sql)){
                      ?>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Tanggal Daftar</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" name="tanggal_daftar" placeholder="Tanggal Daftar" value="<?= $data['tanggal_daftar']; ?>" disabled>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" name="nama_pembeli" placeholder="Name" value="<?= $data['nama_pembeli']; ?>" disabled>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" name="email" placeholder="Email" value="<?= $data['email']; ?>" disabled>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="password" placeholder="Password" value="<?= $data['password']; ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">No HP</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="no_hp" placeholder="No HP" value="<?= $data['no_hp']; ?>" disabled>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" name="alamat" placeholder="Alamat"><?= $data['alamat']; ?></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Kota</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="kota" placeholder="Kota" value="<?= $data['kota']; ?>">
                        </div>
                      </div>
                      <?php
                        }
                      ?>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox" required> Data Yang Saya Masukkan Sudah <bold>Sesuai</bold> Dengan <a href="#">terms and conditions</a> Dan Dapat Saya PertanggungJawabkan
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" name="ubah" class="btn btn-primary">Simpan Update</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php
require_once "footer.php";

if(isset($_POST['ubah'])){
    $simpan=mysqli_query($koneksi,"update pembeli set password='$_POST[password]', alamat='$_POST[alamat]', kota='$_POST[kota]' where id_pembeli='$_SESSION[id_pembeli]'");
    if($simpan){
        echo "<script>alert('Berhasil Ubah'); location.href = location.pathname</script>";
    }else{
        echo "<script>alert('Gagal'); location.href = location.pathname</script>";;
    }
}
?>