<?php 
if (!empty($_POST['kriteriaadd'])) 
{
	$kriteriaadd = $_POST['kriteriaadd']; 					
	$insert = $db->Execute("INSERT INTO kriteria VALUES ('','$kriteriaadd')");

	if ($insert) 
	{
    echo "<script>alert('Tambah Berhasil')</script>";
    echo "<script>location.href=<?php echo _URL; ?>'admin/index.php?mod=content.kriteria'</script>";
    // header('Location:admin/index.php?mod=content.kriteria');
	}
}
?>
<div class="modal-body">
<!--FORM MODAL-->
<form class="form-horizontal" method="post" action="" role="form">
  <fieldset>
    <div class="form-group">
      <label for="inputNama" class="col-lg-6 control-label">Nama Kriteria</label>
      <div class="col-lg-12">
        <input class="form-control" id="kriteriaadd" placeholder="Nama" name="kriteriaadd" type="text" maxlength="50" required></div>
    </div>
    <div class="form-group">
      <div class="col-lg-12 col-lg-offset-6">
        <a href="<?php echo _URL; ?>admin/index.php?mod=content.kriteria" class="btn btn-default">Batal</a>
        <button type="submit" id="tambah" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </fieldset>
</form>
<!--END FORM MODAL--> 