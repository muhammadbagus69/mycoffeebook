<br/>
<a href='<?php echo _URL; ?>admin/index.php?mod=content.resep_tambah' class="btn btn-primary open_modal"><i class="glyphicon glyphicon-plus"></i>  Tambah Data</a>

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
				<tr class="tr_<?php echo $value['id']; ?>">
					<td><?php echo $no; ?></td>
					<td><img src="<?php echo img_show($value['image']); ?>" style="height: 80px;width: 80px"></td>
					<td><?php echo $value['nama'] ?></td>
					<td><?php echo $value['kategori'] ?></td>
					<td><?php echo $value['komposisi'] ?></td>
					<td><?php echo $value['pembuatan'] ?></td>
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