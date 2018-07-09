<?php 

if (!empty($_POST['nilai'])) 
{
	$nilai = $_POST['nilai'];
	$keterangan = $_POST['keterangan'];
	$query = $db->Execute("INSERT INTO nilai VALUES ('','$nilai','$keterangan')");

if ($query) 
	{
		echo "<script>alert('Tambah Berhasil')</script>";
    echo "<script>location.href='"._URL."admin/index.php?mod=content.nilaikriteria'</script>";
	}else{
    echo "<script>alert('Tambah Data Gagal!!!')</script>";
  }
}

?>

<form class="form-horizontal" method="post" action="" role="form" enctype="multipart/form-data">
  <fieldset>
    <div class="form-group">
      <label for="inputNama" class="col-lg-6 control-label">Nilai Kriteria</label>
      <div class="col-lg-12">
        <input class="form-control" id="nilai" placeholder="Angka" name="nilai" type="text" maxlength="50" required></div>
    </div>
    <div class="form-group">
      <label for="inputNama" class="col-lg-6 control-label">Keterangan</label>
      <div class="col-lg-12">
        <input class="form-control" id="keterangan" placeholder="Keterangan" name="keterangan" type="text" maxlength="50" required></div>
    </div>
    <div class="form-group">
      <div class="col-lg-12 col-lg-offset-6">
        <a href="<?php echo _URL; ?>admin/index.php?mod=content.nilaikriteria" class="btn btn-default">Batal</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </fieldset>
</form>