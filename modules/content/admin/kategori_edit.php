<?php 
  
  $id = $_GET['id'];
  $query = $db->getRow("SELECT * FROM kategori WHERE id='$id'");

  if (!empty($_POST['kategori'])) 
  {
    $kategori = $_POST['kategori'];
    $date = date('Ymds');
    $filename = $date.'_'.$_FILES['image']['name'];

    $update = $db->Execute("UPDATE kategori SET kategori='$kategori', image='$filename' WHERE id='$id'");
    move_uploaded_file($_FILES['image']['tmp_name'], _ROOT.'images/uploads/'.$filename);

    if ($update) 
    {
      echo '<script>alert("Data berhasil diubah")</script>';
      echo "<script>location.href='"._URL."admin/index.php?mod=content.kategori'</script>";
      
    }else{
      echo '<script>alert("Ubah data gagal")</script>';
    }
  }
  
?>

<form class="form-horizontal" method="post" action="" role="form" enctype="multipart/form-data">
  <fieldset>
    <div class="form-group">
      <label for="inputNama" class="col-lg-6 control-label">Nama Kategori</label>
      <div class="col-lg-12">
        <input value="<?php echo $query['kategori']; ?>" class="form-control" id="kategori" placeholder="Nama" name="kategori" type="text" maxlength="50" required></div>
    </div>
    <div class="form-group">
      <label for="inputNama" class="col-lg-6 control-label">Image</label>
      <div class="col-lg-12">
        <input value="<?php echo $query['image']; ?>"  id="image" name="image" type="file"></div>
    </div>
    <div class="form-group">
      <div class="col-lg-12 col-lg-offset-6">
        <a href="<?php echo _URL; ?>admin/index.php?mod=content.kategori" class="btn btn-default">Batal</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </fieldset>
</form>