<?php 
  
  if (!empty($_POST['nama'])) 
  {
    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $deskripsi = $_POST['deskripsi'];
    $espresso = $_POST['espresso'];
    $campuran = $_POST['campuran'];
    $suhu = $_POST['suhu'];
    $volume = $_POST['volume'];
    $bubuk = $_POST['bubuk'];
    $alat = $_POST['alat'];

    $cara_buat = $_POST['cara_buat'];

    $date = date('Ymds');
    $filename = $date.'_'.$_FILES['image']['name'];

    $insert = $db->Execute("INSERT INTO resep VALUES('','$nama','$kategori','$filename','$deskripsi','{$_SESSION['admin_id']}','1')");
    move_uploaded_file($_FILES['image']['tmp_name'], _ROOT.'images/uploads/'.$filename);

    if ($insert) 
    {
      $id_resep = $db->insert_ID();
      $insert_k = $db->Execute("INSERT INTO komposisi 
        VALUES('',$id_resep,$espresso),
        ('',$id_resep,$campuran),
        ('',$id_resep,$suhu),
        ('',$id_resep,$volume),
        ('',$id_resep,$bubuk),
        ('',$id_resep,$alat)");
      foreach ($cara_buat as $key => $buat) 
      {
        $urut = $key+1;
        $insert_p = $db->Execute("INSERT INTO pembuatan VALUES('',$id_resep,$urut,'$buat')");
      }
      echo "<script>alert('Simpan Berhasil')</script>";
      echo "<script>location.href='"._URL."admin/index.php?mod=content.resep'</script>";
    }else{
      echo "<script>alert('Simpan Data Gagal!!')</script>";
    }
  }

?>

<!--FORM MODAL-->
<form class="form-horizontal" method="post" action="" role="form" enctype="multipart/form-data" novalidate="novalidate">
  <fieldset>
    <div class="form-group">
      <label for="inputNama" class="col-lg-6 control-label">Nama Resep</label>
      <div class="col-lg-12">
        <input class="form-control" id="nama" placeholder="Nama Resep" name="nama" type="text" maxlength="50" required></div>
    </div>
    <div class="form-group">
      <label for="inputNama" class="col-lg-2 control-label">Kategori</label>
      <div class="col-lg-10">
        <select class="form-control" name="kategori" id="kategori">
          <option>Pilih Kategori </option>
              <?php
              $kat = $db->getAll("SELECT * FROM kategori");
              foreach ($kat as $opt) {
                $p_no = $opt['id'];
                $p_kat = $opt['kategori'];
              echo "<option value='$p_no'>$p_kat</option>";  
              }
            ?>
          </select>
      </div>
    </div>
    <div class="form-group">
      <label for="textarea" class="col-lg-6 control-label">Deskripsi</label>
      <div class="col-lg-12">
        <textarea name="deskripsi" id="textarea" class="form-control" rows="3" required="required"></textarea>
      </div>
    </div>
    <div class="form-group">
        <div class="col-md-4">
          <div class="form-group">
            <label for="inputNama" class="col-lg-2 control-label">Espresso</label>
            <div class="col-lg-5">
              <select class="form-control" name="espresso" id="espresso">
                <option>Pilih Volume Shot Esspresso </option>
                  <?php
                    $ess = $db->getAll("SELECT * FROM subkriteria WHERE id_kriteria='1'");
                    foreach ($ess as $opt) {
                      $p_no = $opt['id'];
                      $p_kat = $opt['subkriteria'];
                    echo "<option value='$p_no'>$p_kat</option>";  
                    }
                  ?>
                </select>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="inputNama" class="col-lg-2 control-label">Bahan Campuran</label>
            <div class="col-lg-5">
              <select class="form-control" name="campuran" id="campuran">
                <option>Pilih Bahan Campuran </option>
                  <?php
                    $ess = $db->getAll("SELECT * FROM subkriteria WHERE id_kriteria='2'");
                    foreach ($ess as $opt) {
                      $p_no = $opt['id'];
                      $p_kat = $opt['subkriteria'];
                    echo "<option value='$p_no'>$p_kat</option>";  
                    }
                  ?>                
                </select>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="inputNama" class="col-lg-2 control-label">Suhu Air</label>
            <div class="col-lg-5">
              <select class="form-control" name="suhu" id="suhu">
                <option>Pilih Suhu </option>
                  <?php
                    $ess = $db->getAll("SELECT * FROM subkriteria WHERE id_kriteria='3'");
                    foreach ($ess as $opt) {
                      $p_no = $opt['id'];
                      $p_kat = $opt['subkriteria'];
                    echo "<option value='$p_no'>$p_kat</option>";  
                    }
                  ?>
                </select>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="inputNama" class="col-lg-2 control-label">Volume Air</label>
            <div class="col-lg-5">
              <select class="form-control" name="volume" id="volume">
                <option>Pilih Volume Air </option>
                  <?php
                    $ess = $db->getAll("SELECT * FROM subkriteria WHERE id_kriteria='4'");
                    foreach ($ess as $opt) {
                      $p_no = $opt['id'];
                      $p_kat = $opt['subkriteria'];
                    echo "<option value='$p_no'>$p_kat</option>";  
                    }
                  ?>
                </select>
            <a href="https://en.wikipedia.org/wiki/Shot_glass" target="_blank">Apa itu Shot ?</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="inputNama" class="col-lg-2 control-label">Berat Bubuk Kopi</label>
            <div class="col-lg-5">
              <select class="form-control" name="bubuk" id="bubuk">
                <option>Pilih Berat </option>
                  <?php
                    $ess = $db->getAll("SELECT * FROM subkriteria WHERE id_kriteria='5'");
                    foreach ($ess as $opt) {
                      $p_no = $opt['id'];
                      $p_kat = $opt['subkriteria'];
                    echo "<option value='$p_no'>$p_kat</option>";  
                    }
                  ?>
                </select>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="inputNama" class="col-lg-2 control-label">Alat Seduh</label>
            <div class="col-lg-5">
              <select class="form-control" name="alat" id="alat">
                <option>Pilih Alat Seduh </option>
                  <?php
                    $ess = $db->getAll("SELECT * FROM subkriteria WHERE id_kriteria='6'");
                    foreach ($ess as $opt) {
                      $p_no = $opt['id'];
                      $p_kat = $opt['subkriteria'];
                    echo "<option value='$p_no'>$p_kat</option>";  
                    }
                  ?>
                </select>
            </div>
          </div>
        </div>
    </div>
    <div class="form-group">
      <label for="inputNama" class="col-lg-6 control-label">Cara Pembuatan</label>
        <div class="col-md-12 add_kene">
          <div class="iki_hapus">
            <div class="col-md-11">
              <div class="form-group">
                <input type="text" name="cara_buat[]" id="input" class="form-control" value="">
              </div>
            </div>
            <div class="col-md-1">
              <div class="form-group">
                <button type="button" class="btn btn-default add_mz"><i class="glyphicon glyphicon-plus"></i></button>
              </div>
            </div>
          </div>
        </div>
    </div>
    <div class="form-group">
      <label for="inputNama" class="col-lg-6 control-label">Foto</label>
      <div class="col-lg-12">
        <input  id="image" name="image" type="file"></div>
    </div>
    <div class="form-group">
      <div class="col-lg-12 col-lg-offset-6">
        <a href="<?php echo _URL; ?>admin/index.php?mod=content.resep" class="btn btn-default">Batal</a>
        <button type="submit" id="tambah" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </fieldset>
</form>
<!--END FORM MODAL--> 

<script type="text/javascript">
  $(document).ready(function() {
    $('body').on('click', '.add_mz', function(event) {
      var a = '<div class="iki_hapus"> <div class="col-md-11"> <div class="form-group"> <input type="text" name="cara_buat[]" id="input" class="form-control" value="" pattern="" title=""> </div> </div> <div class="col-md-1"> <div class="form-group"> <button type="button" class="btn btn-default add_mz"><i class="glyphicon glyphicon-plus"></i></button> </div> </div> </div>';
      $('.add_kene').append(a);
      $(this).removeClass('add_mz').addClass('remove_mz');
      $(this).children('i').addClass('glyphicon-trash').removeClass('glyphicon-plus');
    });

    $('body').on('click', '.remove_mz', function(event) {
      $(this).parents('.iki_hapus').remove();
    });
  });
</script>