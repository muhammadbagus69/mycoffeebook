<?php

?>
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
<button type="button" class="btn btn-primary">Tambah Data</button>

<br/>
<br/>

<div class="row">
	<div class="col-md-12">
		<?php 
			$query = $db->getAll("SELECT * FROM user");
			foreach ($query as $value) 
			{
		?>
		<div class="col-sm-4">
			<div class="card" style="padding: 10px;">
			  <img src="../images/uploads/logo.png" alt="Avatar" style="width:100%">
			  <div class="container-fluid">
			    <h4 style="text-align: center;"><b><?php echo $value['username']; ?></b></h4>
			  </div>
			  	<?php 
          if ($value['level'] == 0) 
          {
          	?>
				  <div class="card-footer container">
				  	<button type="button" class="btn btn-success">Edit</button>
				  	<button type="button" class="btn btn-danger">Hapus</button>
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
</div>


