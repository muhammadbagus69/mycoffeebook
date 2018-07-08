<?php 
	$resep = $db->getOne("SELECT COUNT(id) FROM resep");
	$user = $db->getOne("SELECT COUNT(id) FROM user");
	$kategori = $db->getOne("SELECT COUNT(id) FROM kategori");
	$kriteria = $db->getOne("SELECT COUNT(id) FROM kriteria");
?>

<br/>
<div class="row">
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="<?php echo _URL.'images/uploads/kopi.png'; ?>" alt="..." style="height: 300px;width: 300px">
      <div class="caption">
        <p>
	        <a href="<?php echo _URL; ?>admin/index.php?mod=content.resep" style="font-size: 30px;color: black;">Data Resep</a> 
	        <a href="<?php echo _URL; ?>admin/index.php?mod=content.resep" class="pull-right" style="font-size: 30px;"><?php echo $resep; ?></a>
	      </p> 
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="<?php echo _URL.'images/uploads/no_user.png'; ?>" alt="..." style="height: 300px;width: 300px">
      <div class="caption">
        <p>
	        <a href="<?php echo _URL; ?>admin/index.php?mod=content.user" style="font-size: 30px;color: black;">Data User</a> 
	        <a href="<?php echo _URL; ?>admin/index.php?mod=content.user" class="pull-right" style="font-size: 30px;"><?php echo $user; ?></a>
	      </p>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="<?php echo _URL.'images/uploads/kategori_icon.png'; ?>" alt="..." style="height: 300px;width: 300px">
      <div class="caption">
        <p>
	        <a href="<?php echo _URL; ?>admin/index.php?mod=content.kategori" style="font-size: 30px;color: black;">Data Kategori</a> 
	        <a href="<?php echo _URL; ?>admin/index.php?mod=content.kategori" class="pull-right" style="font-size: 30px;"><?php echo $kategori; ?></a>
	      </p>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="<?php echo _URL.'images/uploads/kriteria_icon.png'; ?>" alt="..." style="height: 300px;width: 300px">
      <div class="caption">
        <p>
	        <a href="<?php echo _URL; ?>admin/index.php?mod=content.kriteria" style="font-size: 30px;color: black;">Data Kriteria</a> 
	        <a href="<?php echo _URL; ?>admin/index.php?mod=content.kriteria" class="pull-right" style="font-size: 30px;"><?php echo $kriteria; ?></a>
	      </p>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="<?php echo _URL.'images/uploads/nilai_kriteria.png'; ?>" alt="..." style="height: 300px;width: 300px">
      <div class="caption">
        <p>
	        <a href="<?php echo _URL; ?>admin/index.php?mod=content.kriteria" style="font-size: 30px;color: black;">Data Nilai Kriteria</a> 
	        <a href="<?php echo _URL; ?>admin/index.php?mod=content.kriteria" class="pull-right" style="font-size: 30px;"><?php echo $kriteria; ?></a>
	      </p>
      </div>
    </div>
  </div>
</div>