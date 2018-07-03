<?php 
  $id = $_GET['id'];
  $query = $db->getRow("SELECT * FROM kriteria WHERE id='$id'");
  pr($id);
?>

<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
            <h4 class="modal-title" id="myModalLabel">Edit Data</h4>
        </div>
        <div class="modal-body">
          <!--FORM MODAL-->
          <form class="form-horizontal" method="post" action="<?php echo _URL; ?>admin/index.php?mod=content.kriteria_edit_aksi" role="form">
            <fieldset>
              <input class="form-control" type="hidden" id="id" value='<?php echo $query['id']; ?>' name="id" type="text"></div>
              <div class="form-group">
                <label for="inputNama" class="col-lg-6 control-label">Nama Kriteria</label>
                <div class="col-lg-12">
                  <input class="form-control" id="kriteria" value='<?php echo $query['kriteria']; ?>' placeholder="Nama" name="kriteria" type="text" maxlength="50" required></div>
              </div>
              <div class="form-group">
                <div class="col-lg-12 col-lg-offset-6">
                  <button type="reset" class="btn btn-default" data-dismiss="modal">Batal</button>
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
              </div>
            </fieldset>
          </form>
          <!--END FORM MODAL--> 
            
        </div>
    </div>
</div>



