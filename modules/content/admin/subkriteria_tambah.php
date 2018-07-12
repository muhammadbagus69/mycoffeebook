<?php 
  if (!empty($_POST['kriteria'])) 
  {
    $kriteria = $_POST['kriteria'];
    $subkriteria = $_POST['subkriteria'];
    $nilai = $_POST['nilai'];
    
    $insert = $db->Execute("INSERT INTO subkriteria VALUES('','$kriteria','$subkriteria','$nilai')");

    if ($insert)
     {
      echo "<script>alert('Tambah Berhasil')</script>";
     }else{
      echo "<script>alert('Gagal Tambah Data!!')</script>";
     } 
  }
?>

<form class="form-horizontal" method="post" action="" role="form" enctype="multipart/form-data">
  <fieldset>
    <div class="form-group">
      <label for="inputNama" class="col-lg-2 control-label">Kategori</label>
      <div class="col-lg-10">
        <select class="form-control" name="kriteria" id="kriteria">
          <option>Pilih Kriteria </option>
              <?php
              $kat = $db->getAll("SELECT * FROM kriteria");
              foreach ($kat as $opt) {
                $p_no = $opt['id'];
                $p_kat = $opt['kriteria'];
              echo "<option value='$p_no'>$p_kat</option>";  
              }
            ?>
          </select>
      </div>
    </div>
    <div class="form-group">
      <label for="inputNama" class="col-lg-6 control-label">Nama Subkriteria</label>
      <div class="col-lg-12">
        <input class="form-control" id="subkriteria" placeholder="Nama Subkriteria" name="subkriteria" type="text" maxlength="50" required></div>
    </div>
    <div class="form-group">
      <label for="inputNama" class="col-lg-2 control-label">Nilai</label>
      <div class="col-lg-10">
        <select class="form-control" name="nilai" id="nilai">
          <option>Pilih Nilai </option>
              <?php
              $kat = $db->getAll("SELECT * FROM nilai");
              foreach ($kat as $opt) {
                $p_no = $opt['id'];
                $p_kat = $opt['keterangan'];
                $p_nil = $opt['nilai'];
              echo "<option value='$p_nil'>$p_nil".' '."$p_kat</option>";  
              }
            ?>
          </select>
      </div>
    </div>
    <div class="form-group">
      <div class="col-lg-12 col-lg-offset-6">
        <a href="<?php echo _URL; ?>admin/index.php?mod=content.subkriteria" class="btn btn-default">Batal</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </fieldset>
</form>