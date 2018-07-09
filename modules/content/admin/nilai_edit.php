<?php  
  $id = $_GET['id'];
  $query = $db->getRow("SELECT * FROM nilai where id='$id'");

  if (!empty($_POST['nilai'])) 
  {
    $nilai = $_POST['nilai'];
    $keterangan = $_POST['keterangan'];

    $update = $db->Execute("UPDATE nilai SET nilai='$nilai',keterangan='$keterangan' WHERE id='$id'");
    if ($update) 
    {
      echo '<script>alert("Data berhasil diubah")</script>';
      echo "<script>location.href='"._URL."admin/index.php?mod=content.nilaikriteria'</script>";
    }else{
      echo '<script>alert("Ubah data gagal")</script>';
    }
  }
?>

<form class="form-horizontal" method="post" action="" role="form" enctype="multipart/form-data">
  <fieldset>
    <div class="form-group">
      <label for="inputNama" class="col-lg-6 control-label">Nilai Kriteria</label>
      <div class="col-lg-12">
        <input value="<?php echo $query['nilai']; ?>" class="form-control" id="nilai" placeholder="Angka" name="nilai" type="text" maxlength="50" required></div>
    </div>
    <div class="form-group">
      <label for="inputNama" class="col-lg-6 control-label">Keterangan</label>
      <div class="col-lg-12">
        <input value="<?php echo $query['keterangan']; ?>" class="form-control" id="keterangan" placeholder="Keterangan" name="keterangan" type="text" maxlength="50" required></div>
    </div>
    <div class="form-group">
      <div class="col-lg-12 col-lg-offset-6">
        <a href="<?php echo _URL; ?>admin/index.php?mod=content.nilaikriteria" class="btn btn-default">Batal</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </fieldset>
</form>