<?php 

  if (!empty($_POST['nama'])) 
  {
    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $deskripsi = $_POST['deskripsi'];
    $cara_buat = $_POST['cara_buat'];

    $insert = $db->Execute("");
  }

?>

<!--FORM MODAL-->
<form class="form-horizontal" method="post" action="" role="form" enctype="multipart/form-data">
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
                  <option value='1'>1 Shot Espresso</option>
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
                  <option value='1'>Cream</option>                
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
                  <option value='1'>Panas</option>
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
                  <option value='1'>1 Shot Air</option>
                </select>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="inputNama" class="col-lg-2 control-label">Berat Bubuk Kopi</label>
            <div class="col-lg-5">
              <select class="form-control" name="bubuk" id="bubuk">
                <option>Pilih Berat </option>
                  <option value='1'>0.5 Gram</option>
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
                  <option value='1'>Vietnam Drip</option>
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
                <input type="text" name="cara_buat[]" id="input" class="form-control" value="" required="required" >
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
        <input  id="foto" name="foto" type="file"></div>
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
      var a = '<div class="iki_hapus"> <div class="col-md-11"> <div class="form-group"> <input type="text" name="cara_buat[]" id="input" class="form-control" value="" required="required" pattern="" title=""> </div> </div> <div class="col-md-1"> <div class="form-group"> <button type="button" class="btn btn-default add_mz"><i class="glyphicon glyphicon-plus"></i></button> </div> </div> </div>';
      $('.add_kene').append(a);
      $(this).removeClass('add_mz').addClass('remove_mz');
      $(this).children('i').addClass('glyphicon-trash').removeClass('glyphicon-plus');
    });

    $('body').on('click', '.remove_mz', function(event) {
      $(this).parents('.iki_hapus').remove();
    });
  });
</script>