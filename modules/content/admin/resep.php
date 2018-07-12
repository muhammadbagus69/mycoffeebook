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
			<th style="vertical-align: middle;">Deskripsi</th>
			<th style="vertical-align: middle;">Nama Pembuat</th>
			<th style="width: 150px;vertical-align: middle;"></th>
		</tr>
	</thead>
		<?php
		$query = $db->getAll("SELECT  
														`resep`.`id`,
														`resep`.`deskripsi`,
														`kategori`.`kategori` ,  
														`resep`.`nama` ,  
														`resep`.`image` , 
														`user`.`username`, 
														count(`komposisi`.`id_resep`) as TOTAL 
													FROM  
														`resep` 
													LEFT JOIN 
														kategori 
													ON  
														`kategori`.`id` =  `resep`.`id_kategori` 
													LEFT JOIN 
														user 
													ON 
														`user`.`id` = `resep`.`id_user` 
													LEFT JOIN 
														`komposisi` 
													ON 
														`resep`.`id` = `komposisi`.`id_resep`
													GROUP BY 
														`komposisi`.`id_resep`
													ORDER BY  
														`kategori`.`kategori`");
		$no = $noo = 1;
		foreach ($query as $value) 
		{		
			// pr("SELECT cara FROM pembuatan WHERE id_resep = '{$value['id']}' ORDER BY urutan ASC", __FILE__.':'.__LINE__);die();
			$tampil_k = $db->getAll("SELECT 
																`kriteria`.`kriteria`,
																`subkriteria`.`subkriteria` 
															FROM 
																`kriteria`
															LEFT JOIN 
																subkriteria 
															ON 
																`kriteria`.`id` = `subkriteria`.`id_kriteria` 
															LEFT JOIN 
																komposisi 
															ON 
																`subkriteria`.`id` = `komposisi`.`id_subkriteria` 
															WHERE 
																`komposisi`.`id_resep` = '{$value['id']}'");
		?>
			<tbody>
				<tr class="tr_<?php echo $value['id']; ?>">
					<td><?php echo $no; ?></td>
					<td><img src="<?php echo img_show($value['image']); ?>" style="height: 80px;width: 80px"></td>
					<td><?php echo $value['nama'] ?></td>
					<td><?php echo $value['kategori'] ?></td>
					<td style="text-align: center;"><span data-toggle="popover" 
										data-trigger="hover" 
										data-placement="right" 
										data-html="true" 
										title="<div class='text-center'>Komposisi</div>" 
										data-content="<table class='table table-hover table-bordered'>
																		<thead>
																			<tr>
																				<th>No</th>
																				<th>Komposisi</th>
																				<th>Takaran</th>
																			</tr>
																		</thead>
																		<tbody>
																			<?php 
																			foreach ($tampil_k as $dvalue) 
																			{
																				?>
																				<tr>
																					<td><?php echo $noo; ?></td>
																					<td><?php echo $dvalue['kriteria']; ?></td>
																					<td><?php echo $dvalue['subkriteria']; ?></td>
																				</tr>
																				<?php
																				$noo++;
																			}
																			?>
																		</tbody>
																	 </table>" style="border-bottom: 1px #000 dashed; cursor: pointer"><?php echo $value['TOTAL'] ?></span></td>
					<td><?php echo $value['deskripsi'] ?></td>
					<td><?php echo $value['username'] ?></td>
					<td>
						<a href="<?php echo _URL; ?>admin/index.php?mod=content.resep_edit&id=<?php echo $value['id']; ?>" class='btn btn-success'><i class="glyphicon glyphicon-pencil"></i></a>
						<button class="btn btn-danger open_delete" data-id="<?php echo $value['id']; ?>"><i class="glyphicon glyphicon-trash"></i></button>
						<a href="<?php echo _URL; ?>admin/index.php?mod=content.resep_detail&id=<?php echo $value['id']; ?>" class="btn btn-info"><i class="glyphicon glyphicon-chevron-right"></i></a>
					</td>
				</tr>
			</tbody>
		<?php
		$no++;
			}
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

