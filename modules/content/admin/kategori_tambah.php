<?php 
	if (!empty($_POST['kategori'])) 
	{
		$kategori = $_POST['kategori'];
    $date = date('Yms');
    $filename = $date.'_'.$_FILES['foto']['name'];
		$insert = $db->Execute("INSERT INTO kategori VALUES ('','$kategori','$filename')");
    move_uploaded_file($_FILES['foto']['tmp_name'], _ROOT.'images/uploads/'.$filename);


		if ($insert) 
		{
			echo "<script>alert('Tambah Berhasil')</script>";
      echo "<script>location.href='"._URL."admin/index.php?mod=content.kategori'</script>";

		}
	}
?>
<form class="form-horizontal" method="post" action="" role="form" enctype="multipart/form-data">
  <fieldset>
    <div class="form-group">
      <label for="inputNama" class="col-lg-6 control-label">Nama Kriteria</label>
      <div class="col-lg-12">
        <input class="form-control" id="kategori" placeholder="Nama" name="kategori" type="text" maxlength="50" required></div>
    </div>
    <div class="form-group">
      <label for="inputNama" class="col-lg-6 control-label">Image</label>
      <div class="col-lg-12">
        <input  id="foto" name="foto" type="file"></div>
    </div>
    <div class="form-group">
      <div class="col-lg-12 col-lg-offset-6">
        <button type="reset" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </fieldset>
</form>