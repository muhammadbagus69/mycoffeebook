<?php 
  $id = $_GET['id'];
  $query = $db->getRow("SELECT * FROM kriteria WHERE id='$id'");

  if (!empty($_POST['kriteria'])) 
  {
    $kriteria = $_POST['kriteria'];

    $update = $db->Execute("UPDATE kriteria SET kriteria='$kriteria' WHERE id='$id'");
    if ($update) 
    {
      echo '<script>alert("Data berhasil diubah")</script>';
      echo "<script>location.href='"._URL."admin/index.php?mod=content.kriteria'</script>";
      
    }else{
      echo '<script>alert("Ubah data gagal")</script>';
    }
  }
?>

<div class="modal-body">
  <h2>Edit Data</h2>
  <hr/>
  <!--FORM MODAL-->
  <form class="form-horizontal" method="post" action="" role="form">
    <fieldset>
      <input class="form-control" type="hidden" id="id" value='<?php echo $query['id']; ?>' name="id" type="text"></div>
      <div class="form-group">
        <label for="inputNama" class="col-lg-6 control-label">Nama Kriteria</label>
        <div class="col-lg-12">
          <input class="form-control" id="kriteria" value='<?php echo $query['kriteria']; ?>' placeholder="Nama" name="kriteria" type="text" maxlength="50" required></div>
      </div>
      <div class="form-group">
        <div class="col-lg-12 col-lg-offset-6">
          <a href="<?php echo _URL; ?>admin/index.php?mod=content.kriteria" class="btn btn-default">Batal</a>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </div>
    </fieldset>
  </form>
  <!--END FORM MODAL--> 
    
</div>
