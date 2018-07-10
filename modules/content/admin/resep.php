<br/>
<a href='<?php echo _URL; ?>admin/index.php?mod=content.resep_tambah' class="btn btn-primary open_modal"><i class="glyphicon glyphicon-plus"></i>  Tambah Data</a>

<br/>
<br/>
<table class="table table-hover table-bordered">
	<thead>
		<tr style="background-color: grey;color: white;">
			<th style="vertical-align: middle;">No</th>
			<th style="vertical-align: middle;">Gambar</th>
			<th style="vertical-align: middle;">Nama Resep</th>
			<th style="vertical-align: middle;">Kategori</th>
			<th style="vertical-align: middle;">Komposisi</th>
			<th style="vertical-align: middle;">Cara Buat</th>
			<th style="vertical-align: middle;">Nama Pembuat</th>
			<th style="width: 150px;vertical-align: middle;"></th>
		</tr>
	</thead>
		<?php
		$query = $db->getAll("SELECT  `kategori`.`kategori` ,  `resep`.`nama` ,  `resep`.`image` , `resep`.`pembuatan`,`user`.`username`, count(`komposisi`.`id_resep`) as TOTAL 
											FROM  `resep` 
											LEFT JOIN kategori ON  `kategori`.`id` =  `resep`.`id_kategori` LEFT JOIN user ON `user`.`id` = `resep`.`id_user` LEFT JOIN `komposisi` ON `resep`.`id` = `komposisi`.`id_resep`
											GROUP BY `komposisi`.`id_resep`
											ORDER BY  `kategori`.`kategori`");
		$no = 1;
		foreach ($query as $value) 
			{
		?>
			<tbody>
				<tr class="tr_<?php echo $value['id']; ?>">
					<td><?php echo $no; ?></td>
					<td><img src="<?php echo img_show($value['image']); ?>" style="height: 80px;width: 80px"></td>
					<td><?php echo $value['nama'] ?></td>
					<td><?php echo $value['kategori'] ?></td>
					<td><span data-toggle="popover" 
										data-trigger="hover" 
										data-placement="bottom" 
										data-html="true" 
										title="Komposisi" 
										data-content="<table class='table table-hover table-bordered'>
																		<thead>
																			<tr>
																				<th>No</th>
																				<th>Komposisi</th>
																				<th>Bobot</th>
																			</tr>
																		</thead>
																		<tbody>
																			<tr>
																				<td>1</td>
																				<td>Espresso</td>
																				<td>1 Shot Espresso</td>
																			</tr>
																		</tbody>
																	 </table>"><?php echo $value['TOTAL'] ?></span></td>
					<td><?php echo $value['pembuatan'] ?></td>
					<td><?php echo $value['username'] ?></td>
					<td>
						<a href="<?php echo _URL; ?>admin/index.php?mod=content.resep_edit&id=<?php echo $value['id']; ?>" class='btn btn-success'><i class="glyphicon glyphicon-pencil"></i></a>
						<button class="btn btn-danger open_delete" data-id="<?php echo $value['id']; ?>"><i class="glyphicon glyphicon-trash"></i></button>
					</td>
				</tr>
			</tbody>
		<?php
			}
		$no++
		?>
</table>

<script type="text/javascript">
$(document).ready(function(){
  $('[data-toggle="popover"]').popover();

	$(".open_delete").click(function(e) {
		var a = $(this).data("id");
		if (confirm("Apakah anda yakin akan menghapus ini?")) {
			$.post(_URL+"admin/index.php?mod=content.resep_hapus", {
				"id": a,
			});
			$(".tr_"+a).remove();
		}
  });
});
</script>

