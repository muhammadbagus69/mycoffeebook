<?php 
	
	$id 			= $_GET['id'];
	$querty 	= $db->getAll("SELECT `x`.`id` AS krit_id , `a`.`id` AS sub_id, `a`.`subkriteria` FROM  komposisi as c LEFT JOIN `subkriteria` AS a ON `c`.`id_subkriteria` = `a`.`id` LEFT JOIN `kriteria` As x ON `a`.`id_kriteria` = `x`.`id` WHERE `c`.`id_resep`='$id'");
	$query 		= $db->getRow("SELECT * FROM `resep` WHERE `id` = $id");

	foreach ($querty as $svalue) 
	{
		$k[$svalue['krit_id']] = $svalue['sub_id'];
	}
?>


<div role="tabpanel">
	<!-- Nav tabs -->
	<ul class="nav nav-tabs" role="tablist">
		<li role="presentation" class="active">
			<a href="#EditResep" aria-controls="EditResep" role="tab" data-toggle="tab">Edit Resep</a>
		</li>
		<li role="presentation">
			<a href="#EditKomposisi" aria-controls="EditKomposisi" role="tab" data-toggle="tab">Edit Komposisi</a>
		</li>
		<li role="presentation">
			<a href="#EditCaraPembuatan" aria-controls="EditCaraPembuatan" role="tab" data-toggle="tab">Edit Cara Pembuatan</a>
		</li>
	</ul>

	<!-- Tab panes -->
	<div class="tab-content">
		<div role="tabpanel" class="tab-pane active" id="EditResep">
			<!--FORM MODAL-->
			<?php 

				if (!empty($_POST['nama'])) 
				{
					$nama = $_POST['nama'];
					$kategori = $_POST['kategori'];
					$deskripsi = $_POST['deskripsi'];

					$update = $db->Execute("UPDATE `resep` SET nama ='$nama', id_kategori = '$kategori', deskripsi='$deskripsi' WHERE id = '$id'");
					if ($update) 
					{
						echo "<script>alert('Ubah Resep Berhasil')</script>";
						echo "<script>location.href='"._URL."admin/index.php?mod=content.resep'</script>";	
					}else{
						echo "<script>alert('Ubah Resep Gagal')</script>";
					}
				}

			?>
			<form class="form-horizontal" method="post" action="" role="form" enctype="multipart/form-data" novalidate="novalidate">
			  <fieldset>
			    <div class="form-group">
			      <label for="inputNama" class="col-lg-6 control-label">Nama Resep</label>
			      <div class="col-lg-12">
			        <input class="form-control" value="<?php echo $query['nama']; ?>" id="nama" placeholder="Nama Resep" name="nama" type="text" maxlength="50" required></div>
			    </div>
			    <div class="form-group">
			      <label for="inputNama" class="col-lg-2 control-label">Kategori</label>
			      <div class="col-lg-10">
			        <select class="form-control" name="kategori" id="kategori">
			          <option>Pilih Kategori </option>
			              <?php

			              $kat = $db->getAll("SELECT * FROM kategori");
			              foreach ($kat as $opt) {
			              $selected = $query['id_kategori'] == $opt['id'] ? 'Selected' : '';
			                $p_no = $opt['id'];
			                $p_kat = $opt['kategori'];
			              echo "<option $selected value='".$opt['id']."'>$p_kat</option>";  
			              }
			            ?>
			          </select>
			      </div>
			    </div>
			    <div class="form-group">
			      <label for="textarea" class="col-lg-6 control-label">Deskripsi</label>
			      <div class="col-lg-12">
			        <textarea name="deskripsi" value="" id="textarea" class="form-control" rows="3" required="required"><?php echo $query['deskripsi']; ?></textarea>
			      </div>
			    </div>
					<div class="form-group">
			      <label for="inputNama" class="col-lg-6 control-label">Foto</label>
			      <div class="col-lg-12">
			      	<img src="<?php echo img_show($query['image']); ?>" style="height: 300px;width: 300px"">
			        <!-- <input  id="image" name="image" type="file"> -->
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
			<!--END FORM MODAL--> 
		</div>
		
		<div role="tabpanel" class="tab-pane" id="EditKomposisi">
			<?php

				if (!empty($_POST['espresso'])) 
				{
					$espresso = $_POST['espresso'];
			    $campuran = $_POST['campuran'];
			    $suhu = $_POST['suhu'];
			    $volume = $_POST['volume'];
			    $bubuk = $_POST['bubuk'];
			    $alat = $_POST['alat'];

			    $delKom = $db->Execute("DELETE FROM `komposisi` WHERE `id_resep` = $id");

			    if ($delKom) 
			    {
			    	$insert_k = $db->Execute("INSERT INTO `komposisi` 
																      VALUES('',$id,$espresso),
																      ('',$id,$campuran),
																      ('',$id,$suhu),
																      ('',$id,$volume),
																      ('',$id,$bubuk),
																      ('',$id,$alat)");
			    	if ($insert_k) 
			    	{
							echo "<script>alert('Ubah Komposisi Berhasil')</script>";
							echo "<script>location.href='"._URL."admin/index.php?mod=content.resep'</script>";	
						}else{
							echo "<script>alert('Ubah Komposisi Gagal')</script>";
						}
			    }
				}

			?>
			<form class="form-horizontal" method="post" action="" role="form" enctype="multipart/form-data" novalidate="novalidate">
				<div class="form-group">
		      <div class="col-md-4">
		        <div class="form-group">
		          <label for="inputNama" class="col-lg-2 control-label">Espresso</label>
		          <div class="col-lg-5">
		            <select class="form-control" name="espresso" id="espresso">
		              <option>Pilih Volume Shot Esspresso </option>
		                <?php
		                  $ess = $db->getAll("SELECT * FROM subkriteria WHERE id_kriteria='1'");
		                  foreach ($ess as $opt) 
		                  {
		                    $p_no 			= $opt['id'];
		                  	
		                    $p_kat 			= $opt['subkriteria'];
	                  		$selected1 	= $p_no == $k[1] ? 'Selected' : ''; 
		                  	echo "<option $selected1 value='$p_no'>$p_kat</option>";  
		                  }
		                ?>
		              </select>
		          </div>
		        </div>
		      </div>

		      <div class="col-md-4">
		        <div class="form-group">
		          <label for="inputNama" class="col-lg-2 control-label">Bahan Campuran</label>
		          <div class="col-lg-5">
		            <select class="form-control" name="campuran" id="campuran">
		              <option>Pilih Bahan Campuran </option>
		                <?php
		                  $ess = $db->getAll("SELECT * FROM subkriteria WHERE id_kriteria='2'");
		                  foreach ($ess as $opt) {
		                    $p_no = $opt['id'];
		                    $p_kat = $opt['subkriteria'];
	                  		$selected1 	= $p_no == $k[2] ? 'Selected' : ''; 
		                  echo "<option $selected1 value='$p_no'>$p_kat</option>";  
		                  }
		                ?>                
		              </select>
		          </div>
		        </div>
		      </div>
		      <div class="col-md-4">
		        <div class="form-group">
		          <label for="inputNama" class="col-lg-2 control-label">Suhu Air</label>
		          <div class="col-lg-5">
		            <select class="form-control" name="suhu" id="suhu">
		              <option>Pilih Suhu </option>
		                <?php
		                  $ess = $db->getAll("SELECT * FROM subkriteria WHERE id_kriteria='3'");
		                  foreach ($ess as $opt) {
		                    $p_no = $opt['id'];
		                    $p_kat = $opt['subkriteria'];
	                  		$selected1 	= $p_no == $k[3] ? 'Selected' : ''; 
		                  echo "<option $selected1 value='$p_no'>$p_kat</option>";  
		                  }
		                ?>
		              </select>
		          </div>
		        </div>
		      </div>
		      <div class="col-md-4">
		        <div class="form-group">
		          <label for="inputNama" class="col-lg-2 control-label">Volume Air</label>
		          <div class="col-lg-5">
		            <select class="form-control" name="volume" id="volume">
		              <option>Pilih Volume Air </option>
		                <?php
		                  $ess = $db->getAll("SELECT * FROM subkriteria WHERE id_kriteria='4'");
		                  foreach ($ess as $opt) {
		                    $p_no = $opt['id'];
		                    $p_kat = $opt['subkriteria'];
	                  		$selected1 	= $p_no == $k[4] ? 'Selected' : ''; 
		                  echo "<option $selected1 value='$p_no'>$p_kat</option>";  
		                  }
		                ?>
		              </select>
		          <a href="https://en.wikipedia.org/wiki/Shot_glass" target="_blank">Apa itu Shot ?</a>
		          </div>
		        </div>
		      </div>
		      <div class="col-md-4">
		        <div class="form-group">
		          <label for="inputNama" class="col-lg-2 control-label">Berat Bubuk Kopi</label>
		          <div class="col-lg-5">
		            <select class="form-control" name="bubuk" id="bubuk">
		              <option>Pilih Berat </option>
		                <?php
		                  $ess = $db->getAll("SELECT * FROM subkriteria WHERE id_kriteria='5'");
		                  foreach ($ess as $opt) {
		                    $p_no = $opt['id'];
		                    $p_kat = $opt['subkriteria'];
	                  		$selected1 	= $p_no == $k[5] ? 'Selected' : ''; 

		                  echo "<option $selected1 value='$p_no'>$p_kat</option>";  
		                  }
		                ?>
		              </select>
		          </div>
		        </div>
		      </div>
		      <div class="col-md-4">
		        <div class="form-group">
		          <label for="inputNama" class="col-lg-2 control-label">Alat Seduh</label>
		          <div class="col-lg-5">
		            <select class="form-control" name="alat" id="alat">
		              <option>Pilih Alat Seduh </option>
		                <?php
		                  $ess = $db->getAll("SELECT * FROM subkriteria WHERE id_kriteria='6'");
		                  foreach ($ess as $opt) {
		                    $p_no = $opt['id'];
		                    $p_kat = $opt['subkriteria'];
	                  		$selected1 	= $p_no == $k[6] ? 'Selected' : ''; 
		                  echo "<option $selected1 value='$p_no'>$p_kat</option>";  
		                  }
		                ?>
		              </select>
		          </div>
		        </div>
		      </div>
		    </div>
		    <div class="form-group">
		      <div class="col-lg-12 col-lg-offset-6">
		        <a href="<?php echo _URL; ?>admin/index.php?mod=content.resep" class="btn btn-default">Batal</a>
		        <button type="submit" id="tambah" class="btn btn-primary">Simpan</button>
		      </div>
		    </div>
			</form>
		</div>
		
		<?php
		$howto = $db->getCol("SELECT `cara` FROM `pembuatan` WHERE `id_resep` = '$id' ORDER BY `urutan` ASC");

		if (!empty($_POST['cara_buat'])) 
		{
			$delHowTo = $db->Execute("DELETE FROM `pembuatan` WHERE id_resep = $id");
			
			if ($delHowTo) 
			{
		    $cara_buat = $_POST['cara_buat'];
				foreach ($cara_buat as $key => $buat) 
				{
				 	$urut = $key+1;
				 	if (!empty($buat)) 
				 	{
					 	$insert_p = $db->Execute("INSERT INTO pembuatan VALUES('',$id,$urut,'$buat')");
					 	if ($insert_p) 
					 	{
							echo "<script>alert('Ubah Pembuatan Berhasil')</script>";
							echo "<script>location.href='"._URL."admin/index.php?mod=content.resep'</script>";	
						}else{
							echo "<script>alert('Ubah Pembuatan Gagal')</script>";
						}
				 	}
			  } 
			}
		}


		?>
		<div role="tabpanel" class="tab-pane" id="EditCaraPembuatan">
			<form class="form-horizontal" method="post" action="" role="form" enctype="multipart/form-data" novalidate="novalidate">
				<div class="form-group">
		      <label for="inputNama" class="col-lg-6 control-label">Cara Pembuatan</label>
		        <div class="col-md-12 add_kene">
		        	<?php  
		        	foreach ($howto as $cvalue) 
		        	{
		        		?>
			          <div class="iki_hapus">
			            <div class="col-md-11">
			              <div class="form-group">
			                <input type="text" name="cara_buat[]" id="input" class="form-control" value="<?php echo $cvalue; ?>">
			              </div>
			            </div>
			            <div class="col-md-1">
			              <div class="form-group">
			                <button type="button" class="btn btn-default remove_mz"><i class="glyphicon glyphicon-trash"></i></button>
			              </div>
			            </div>
			          </div>
		        		<?php
		        	}
		        	?>
		          <div class="iki_hapus">
		            <div class="col-md-11">
		              <div class="form-group">
		                <input type="text" name="cara_buat[]" id="input" class="form-control" value="">
		              </div>
		            </div>
		            <div class="col-md-1">
		              <div class="form-group">
		                <button type="button" class="btn btn-default add_mz"><i class="glyphicon glyphicon-plus"></i></button>
		              </div>
		            </div>
		          </div>		        	
		        </div>
		    </div>
		    <div class="form-group">
		      <div class="col-lg-12 col-lg-offset-6">
		        <a href="<?php echo _URL; ?>admin/index.php?mod=content.resep" class="btn btn-default">Batal</a>
		        <button type="submit" id="tambah" class="btn btn-primary">Simpan</button>
		      </div>
		    </div>
			</form>
		</div>
</div>




<script type="text/javascript">
  $(document).ready(function() {
    $('body').on('click', '.add_mz', function(event) {
      var a = '<div class="iki_hapus"> <div class="col-md-11"> <div class="form-group"> <input type="text" name="cara_buat[]" id="input" class="form-control" value="" pattern="" title=""> </div> </div> <div class="col-md-1"> <div class="form-group"> <button type="button" class="btn btn-default add_mz"><i class="glyphicon glyphicon-plus"></i></button> </div> </div> </div>';
      $('.add_kene').append(a);
      $(this).removeClass('add_mz').addClass('remove_mz');
      $(this).children('i').addClass('glyphicon-trash').removeClass('glyphicon-plus');
    });

    $('body').on('click', '.remove_mz', function(event) {
      $(this).parents('.iki_hapus').remove();
    });
  });
</script>