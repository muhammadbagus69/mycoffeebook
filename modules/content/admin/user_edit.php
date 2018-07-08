<?php 

  $id = $_GET['id'];
  $query = $db->getRow("SELECT * FROM user WHERE id='$id'");

  if (!empty($_POST['username'])) 
  {
    $username = $_POST['username'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $alamat = $_POST['alamat'];
    $password = $_POST['password'];
    $date = date('Yms');
    $filename = $date.'_'.$_FILES['foto']['name'];

    $update = $db->Execute("UPDATE user SET username='$username',password='$password', nama='$nama_lengkap',alamat='$alamat',foto='$filename' WHERE id='$id'");
    move_uploaded_file($_FILES['foto']['tmp_name'], _ROOT.'images/uploads/'.$filename);
    
    if ($update) 
    {
      echo '<script>alert("Data berhasil diubah")</script>';
      echo "<script>location.href='"._URL."admin/index.php?mod=content.user'</script>";
      
    }else{
      echo '<script>alert("Ubah data gagal")</script>';
    }
  }

?>

<h2>Ubah Data</h2>
  <hr/>
<!--FORM MODAL-->
<form class="form-horizontal" method="post" action="" role="form" enctype="multipart/form-data">
  <fieldset>
    <div class="form-group">
      <label for="inputNama" class="col-lg-6 control-label">Username</label>
      <div class="col-lg-12">
        <input value='<?php echo $query['username']; ?>' class="form-control" id="username" placeholder="Username / Email" name="username" type="text" maxlength="50" required></div>
    </div>
    <div class="form-group">
      <label for="inputNama" class="col-lg-6 control-label">Nama Lengkap</label>
      <div class="col-lg-12">
        <input value='<?php echo $query['nama']; ?>' class="form-control" id="nama_lengkap" placeholder="Nama Lengkap" name="nama_lengkap" type="text" maxlength="50" required></div>
    </div>
    <div class="form-group">
      <label for="inputNama" class="col-lg-6 control-label">Alamat</label>
      <div class="col-lg-12">
        <input value='<?php echo $query['alamat']; ?>' class="form-control" id="alamat" placeholder="Alamat" name="alamat" type="text" maxlength="50" required></div>
    </div>
    <div class="form-group">
      <label for="inputNama" class="col-lg-6 control-label">Password</label>
      <div class="col-lg-12">
        <input value='<?php echo $query['password']; ?>' class="form-control" id="password" placeholder="Password" name="password" type="password" maxlength="50" required></div>
    </div>
    <div class="form-group">
      <label for="inputNama" class="col-lg-6 control-label">Foto</label>
      <div class="col-lg-12">
        <input value='<?php echo $query['foto']; ?>' id="foto" name="foto" type="file"></div>
    </div>
    <div class="form-group">
      <div class="col-lg-12 col-lg-offset-6">
        <a href="<?php echo _URL; ?>admin/index.php?mod=content.user" class="btn btn-default">Batal</a>
        <button type="submit" id="tambah" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </fieldset>
</form>
<!--END FORM MODAL--> 