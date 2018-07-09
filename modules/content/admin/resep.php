<br/>
<button type="button" class="btn btn-primary" data-toggle="modal" href='#modal-id'>Tambah Data</button>

<br/>
<br/>
<table class="table table-hover table-bordered">
	<thead>
		<tr style="background-color: grey;color: white;">
			<th>No</th>
			<th>Gambar</th>
			<th>Nama Resep</th>
			<th style="width:300px; ">Kategori</th>
			<th>Komposisi</th>
			<th>Pembuatan</th>
			<th style="width: 150px;"></th>
		</tr>
	</thead>
		<?php
		$query = $db->getAll("SELECT  `kategori`.`kategori` ,  `resep`.`nama` ,  `resep`.`image` ,  `resep`.`komposisi` ,  `resep`.`pembuatan` 
											FROM  `resep` 
											LEFT JOIN kategori ON  `kategori`.`id` =  `resep`.`id_kategori` 
											ORDER BY  `kategori`.`kategori`");
		// pr($query, __FILE__.':'.__LINE__);die();
		$no = 1;
		foreach ($query as $value) 
			{
		?>
			<tbody>
				<tr>
					<td><?php echo $no; ?></td>
					<td><img src="<?php echo img_show($value['image']); ?>" style="height: 80px;width: 80px"></td>
					<td><?php echo $value['nama'] ?></td>
					<td><?php echo $value['kategori'] ?></td>
					<td><?php echo $value['komposisi'] ?></td>
					<td><?php echo $value['pembuatan'] ?></td>
					<td>
						<button type="button" class="btn btn-success" data-toggle="modal" href="#modal-edit" id='<?php echo $value['id']; ?>'>Ubah</button>
						<button type="button" class="btn btn-danger" data-toggle="modal" href="#modal-delete" id='<?php echo $value['id']; ?>'>Hapus</button>
					</td>
				</tr>
			</tbody>
		<?php
			}
		$no++
		?>
</table>

<div class="modal fade" id="modal-id">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Tambah Data</h4>
			</div>
			<!-- <?php 
				// if (!empty($_POST['kriteria'])) 
				// {
				// 	$kriteria = $_POST['kriteria']; 					
				// 	$insert = $db->Execute("INSERT INTO kriteria VALUES ('','$kriteria')");

				// 	if ($insert) 
				// 	{
				// 		echo "<script>alert('Tambah Berhasil')</script>";
				// 	}
				// }
			?> -->
			<div class="modal-body">
				<!--FORM MODAL-->
        <form class="form-horizontal" method="post" action="" role="form">
          <fieldset>
            <div class="form-group">
              <label for="inputNama" class="col-lg-6 control-label">Nama Kriteria</label>
              <div class="col-lg-12">
                <input class="form-control" id="kriteria" placeholder="Nama" name="kriteria" type="text" maxlength="50" required></div>
            </div>
            <div class="form-group">
              <div class="col-lg-12 col-lg-offset-6">
                <button type="reset" class="btn btn-default" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </div>
          </fieldset>
        </form>
        <!--END FORM MODAL--> 
			</div>
		</div>
	</div>
</div>


<div class="modal fade" id="modal-edit">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Modal title</h4>
			</div>
			<div class="modal-body">
			<!--FORM MODAL-->
        <form class="form-horizontal" method="post" action="" role="form">
          <fieldset>
            <div class="form-group">
              <label for="inputNama" class="col-lg-6 control-label">Nama Kriteria</label>
              <div class="col-lg-12">
                <input class="form-control" id="kriteria" value="<?php $value['kriteria']; ?>" placeholder="Nama" name="kriteria" type="text" maxlength="50" required></div>
            </div>
            <div class="form-group">
              <div class="col-lg-12 col-lg-offset-6">
                <button type="reset" class="btn btn-default" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </div>
          </fieldset>
        </form>
        <!--END FORM MODAL-->	
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modal-delete">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Modal title</h4>
			</div>
			<div class="modal-body">
				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>