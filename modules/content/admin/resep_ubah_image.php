<?php 
	
	$id 			= $_GET['id'];
	$query 		= $db->getRow("SELECT * FROM `resep` WHERE `id` = $id");

	if (!empty($_FILES['image'])) 
  {
    $date = date('Ymds');
    $filename = $date.'_'.$_FILES['image']['name'];

    $update = $db->Execute("UPDATE resep SET image='$filename' WHERE id='$id'");
    move_uploaded_file($_FILES['image']['tmp_name'], _ROOT.'images/uploads/'.$filename);
    
    if ($update) 
    {
      echo '<script>alert("Data berhasil diubah")</script>';
      echo "<script>location.href='"._URL."admin/index.php?mod=content.resep'</script>";
      
    }else{
      echo '<script>alert("Ubah data gagal")</script>';
    }
  }
?>

<form class="form-horizontal" method="post" action="" role="form" enctype="multipart/form-data" novalidate="novalidate">
			  <fieldset>
					<div class="form-group">
			      <label for="inputNama" class="col-lg-6 control-label">Foto</label>
			      <div class="col-lg-12">
			      	<img src="<?php echo img_show($query['image']); ?>" style="height: 300px;width: 300px"">
			        <input  id="image" name="image" type="file">
		        </div>
			    </div>
			    <div class="form-group">
			      <div class="col-lg-12 col-lg-offset-6">
			        <a href="<?php echo _URL; ?>admin/index.php?mod=content.resep" class="btn btn-default">Batal</a>
			        <button type="submit" id="tambah" class="btn btn-primary">Simpan</button>
			      </div>
			    </div>
			  </fieldset>
			</form>