<br/>
<button type="button" class="btn btn-primary" data-toggle="modal" href='#modal-id'>Tambah Data</button>

<br/>
<table class="table table-hover table-bordered">
	<thead>
		<tr style="background-color: grey;color: white;">
			<th>No</th>
			<th>Kategori</th>
			<th>Aksi</th>
		</tr>
	</thead>
		<?php
		$query = $db->getAll("SELECT * FROM kategori");
		foreach ($query as $value) 
			{
		?>
			<tbody>
				<tr>
					<td><?php echo $value['id']; ?></td>
					<td><?php echo $value['kategori'] ?></td>
					<td>
						<button type="button" class="btn btn-success" data-toggle="modal" href="#modal-edit" id='<?php echo $value['id']; ?>'>Ubah</button>
						<button type="button" class="btn btn-danger" data-toggle="modal" href="#modal-delete" id='<?php echo $value['id']; ?>'>Hapus</button>
					</td>
				</tr>
			</tbody>
		<?php
			}
		?>
</table>

<div class="modal fade" id="modal-id">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Tambah Data</h4>
			</div>
			<?php 
				if (!empty($_POST['kategori'])) 
				{
					$kategori = $_POST['kategori']; 					
					$insert = $db->Execute("INSERT INTO kategori VALUES ('','$kategori')");

					if ($insert) 
					{
						echo "<script>alert('Tambah Berhasil')</script>";
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