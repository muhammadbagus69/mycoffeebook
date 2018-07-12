<?php 

	$id = $_GET['id'];

	$query = $db->getRow("SELECT * FROM resep WHERE id='$id'");
	$how_tomake = $db->getCol("SELECT cara FROM pembuatan WHERE id_resep = '$id' ORDER BY urutan ASC");

?>

<br/>
<a href='<?php echo _URL; ?>admin/index.php?mod=content.resep' class="btn btn-warning open_modal"><i class="glyphicon glyphicon-chevron-left"></i>  Kembali</a>

<br/>
<br/>

<div class="panel panel-primary">
	<div class="panel-heading" style="font-weight: bold;">
		<?php echo $query['nama']; ?>
	</div>
	<div class="panel-body">
		<table class="table table-hover">
			<thead>
				<tr>
					<th class="text-center" width="400px">Gambar</th>
					<th class="text-center">Cara Pembuatan</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><img src="<?php echo img_show($query['image']); ?>" style="height: 400px;width: 400px""></td>
					<td>
						<?php 
						$no = 1;
						foreach ($how_tomake as $key => $value) 
						{
							echo $no.' '.$value.'<br>';

							$no++;
						}
						?>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
