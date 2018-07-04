<style>
.card {
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    transition: 0.3s;
    width: 100%;
}

.card:hover {
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

.container {
    padding: 2px 16px;
}
</style>

<br/>
<a href='<?php echo _URL; ?>admin/index.php?mod=content.user_tambah' class="btn btn-primary open_modal"><i class="glyphicon glyphicon-plus"></i>  Tambah Data</a>

<br/>
<br/>

<div class="row">
		<?php 
			$query = $db->getAll("SELECT * FROM user");
			foreach ($query as $value) 
			{
		?>
		<div class="col-sm-4">
			<div class="card_<?php echo $value['id']; ?>" style="padding: 10px;">
			  <img src="<?php echo img_show($value['foto']); ?>" alt="Avatar" style="width:300px;height: 300px; padding-right: 15px">
			  <div class="container-fluid">
			    <h4 style="text-align: center;"><b><?php echo $value['username']; ?></b></h4>
			  </div>
			  	<?php 
          if ($value['level'] == 0) 
          {
          	?>
				  <div class="card-footer container">
						<a href="<?php echo _URL; ?>admin/index.php?mod=content.user_edit&id=<?php echo $value['id']; ?>" class='btn btn-success'><i class="glyphicon glyphicon-pencil"></i></a>
						<button class="btn btn-danger open_delete" data-id="<?php echo $value['id']; ?>"><i class="glyphicon glyphicon-trash"></i></button>
				  </div>
				  <?php 
          }
          ?>
			</div>
		</div>
		<?php	
			}
		?>
		
</div>

<script type="text/javascript">
$(document).ready(function(){
	$(".open_delete").click(function(e) {
		var a = $(this).data("id");
		if (confirm("Apakah anda yakin akan menghapus ini?")) {
			$.post(_URL+"admin/index.php?mod=content.user_hapus", {
				"id": a,
			});
			$(".card_"+a).remove();
		}
  });
});
</script>