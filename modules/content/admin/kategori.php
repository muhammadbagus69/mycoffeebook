<br/>
<a href='<?php echo _URL; ?>admin/index.php?mod=content.kategori_tambah' class="btn btn-primary open_modal"><i class="glyphicon glyphicon-plus"></i>  Tambah Data</a>

<br/>
<br/>
<table class="table table-hover table-bordered">
	<thead>
		<tr style="background-color: grey;color: white;">
			<th>No</th>
			<th>Image</th>
			<th>Kategori</th>
			<th>Aksi</th>
		</tr>
	</thead>
		<?php
		$no = 1;
		$query = $db->getAll("SELECT * FROM kategori");
		foreach ($query as $k=>$value) 
			{
			$k++;
		?>
			<tbody>
				<tr class="tr_<?php echo $value['id']; ?>">
					<td><?php echo $k; ?></td>
					<td><img src="<?php echo img_show($value['image']); ?>" style="height: 80px;width: 80px"></td>
					<td><?php echo $value['kategori'] ?></td>
					<td>
						<a href="<?php echo _URL; ?>admin/index.php?mod=content.kategori_edit&id=<?php echo $value['id']; ?>" class='btn btn-success'><i class="glyphicon glyphicon-pencil"></i></a>
						<button class="btn btn-danger open_delete" data-id="<?php echo $value['id']; ?>"><i class="glyphicon glyphicon-trash"></i></button>					</td>
				</tr>
			</tbody>
		<?php
			}
		?>
</table>

<script type="text/javascript">
$(document).ready(function(){
	$(".open_delete").click(function(e) {
		var a = $(this).data("id");
		if (confirm("Apakah anda yakin akan menghapus ini?")) {
			$.post(_URL+"admin/index.php?mod=content.kategori_hapus", {
				"id": a,
			});
			$(".tr_"+a).remove();
		}
  });
});
</script>