
<br/>
<a href='<?php echo _URL; ?>admin/index.php?mod=content.subkriteria_tambah' class="btn btn-primary open_modal"><i class="glyphicon glyphicon-plus"></i>  Tambah Data</a>

<br/>
<br/>
<table class="table table-hover table-bordered">
	<?php 
		$query = $db->getAll("SELECT `id`,`kriteria`  FROM `kriteria` WHERE 1");
		foreach ($query as $key => $value) 
		{
			?>
			<tr>
				<th><?php echo $value['kriteria']; ?></th>
				<?php		
				$get_sub = $db->getAll("SELECT * FROM `subkriteria` WHERE `id_kriteria` = '{$value['id']}'");
				
				foreach ($get_sub as $svalue) 
				{
					?>
					<td class="td_<?php echo $svalue['id']; ?>">
						<a href="<?php echo _URL; ?>admin/index.php?mod=content.subkriteria_edit&id=<?php echo $svalue['id']; ?>">
						<?php echo $svalue['subkriteria']; ?>
						</a>
					</td>
					<td>
						<!--  -->
						<button class="btn btn-danger open_delete" data-id="<?php echo $svalue['id']; ?>"><i class="glyphicon glyphicon-trash"></i></button>
					</td>
					<?php
				}
				?>
			</tr>
			<?php
		}
	?>

</table>

<script type="text/javascript">
$(document).ready(function(){
	$(".open_delete").click(function(e) {
		var a = $(this).data("id");
		if (confirm("Apakah anda yakin akan menghapus ini?")) {
			$.post(_URL+"admin/index.php?mod=content.subkriteria_hapus", {
				"id": a,
			});
			$(".td_"+a).remove();
		}
  });
});
</script>