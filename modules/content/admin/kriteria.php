
<br/>
<a href='<?php echo _URL; ?>admin/index.php?mod=content.kriteria_tambah' class="btn btn-primary open_modal"><i class="glyphicon glyphicon-plus"></i>  Tambah Data</a>

<br/>
<br/>
<table class="table table-hover table-bordered">
	<thead>
		<tr style="background-color: grey;color: white;">
			<th>No</th>
			<th>Kriteria</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$query = $db->getAll("SELECT * FROM kriteria");
		foreach ($query as $k => $value) 
		{
			$k++;
			?>
				<tr class="tr_<?php echo $value['id']; ?>">
					<td><?php echo $k; ?></td>
					<td><?php echo $value['kriteria'] ?></td>
					<td>
						<a href="<?php echo _URL; ?>admin/index.php?mod=content.kriteria_edit&id=<?php echo $value['id']; ?>" class='btn btn-success'><i class="glyphicon glyphicon-pencil"></i></a>
						<button class="btn btn-danger open_delete" data-id="<?php echo $value['id']; ?>"><i class="glyphicon glyphicon-trash"></i></button>
					</td>
				</tr>
			<?php
		}
		?>
	</tbody>
</table>

<script type="text/javascript">
$(document).ready(function(){
	$(".open_delete").click(function(e) {
		var a = $(this).data("id");
		if (confirm("Apakah anda yakin akan menghapus ini?")) {
			$.post(_URL+"admin/index.php?mod=content.kriteria_hapus", {
				"id": a,
			});
			$(".tr_"+a).remove();
		}
  });
});
</script>