<!-- BREADCRUMB-->
<section class="au-breadcrumb m-t-75">
  <div class="section__content section__content--p30">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="au-breadcrumb-content">
            <div class="au-breadcrumb-left">
              <span class="au-breadcrumb-span">You are here:</span>
              <ul class="list-unstyled list-inline au-breadcrumb__list">
                <li class="list-inline-item active">
                  <a href="<?php echo _URL.'admin/main' ?>">Dashboard</a>
                </li>
                <li class="list-inline-item seprate">
                  <span>/</span>
                </li>
                <li class="list-inline-item">Kriteria</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- END BREADCRUMB-->

<section class="statistic">
  <div class="section__content section__content--p30"></div>
</section>

<section>
  <div class="section__content section__content--p30">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <!-- DATA TABLE -->
          <h3 class="title-5 m-b-35">data Kriteria</h3>
          <div class="table-data__tool">
            <div class="table-data__tool-right">
              <button class="au-btn au-btn-icon au-btn--green au-btn--small" data-target='#modal-id' data-toggle="modal"> <i class="zmdi zmdi-plus"></i>
                add item
              </button>
            </div>
          </div>

          <div class="col-lg-12">
            <!-- TOP CAMPAIGN-->
            <div class="top-campaign">
                <h3 class="title-3 m-b-30">top campaigns</h3>
                <div class="table-responsive">
                    <table class="table table-top-campaign">
                        <thead>
                          <tr>
                            <th>Kode Kriteria</th>
                            <th>Nama Kriteria</th>
                            <th></th>
                          </tr>
                        </thead>
                      <?php
                        $query = $db->getAll('SELECT * FROM kriteria');
                        foreach ($query as $value) 
                        { 
                          ?>
                        <tbody>
                          <tr>
                            <td><?php echo $value['id']; ?></td>
                            <td><?php echo $value['kriteria']; ?></td>
                            <td>
                              <button class="au-btn-icon btn-success au-btn--small" data-target='#modal-id' data-toggle="modal">
                                <i class="zmdi zmdi-edit"></i>
                                Edit
                              </button>
                              <button class="au-btn-icon btn-danger au-btn--small" data-target='#modal-id' data-toggle="modal">
                                <i class="zmdi zmdi-delete"></i>
                                Hapus
                              </button>
                            </td>
                          </tr>
                        </tbody>
                          <?php
                        }
                      ?>
                    </table>
                </div>
            </div>
            <!--  END TOP CAMPAIGN-->
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<div class="modal fade" id="modal-id">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Data</h4>
      </div>
      <div class="modal-body">
        <!--FORM MODAL-->
        <form class="form-horizontal" method="post" action="">
          <fieldset>
            <input class="form-control" id="id" placeholder="ID Dokter" name="id_dokter" type="hidden">
            <div class="form-group">
              <label for="inputNama" class="col-lg-6 control-label">Username / Email</label>
              <div class="col-lg-12">
                <input class="form-control" id="inputNama" placeholder="Username" name="nama" type="text" maxlength="50" required></div>
            </div>
            <div class="form-group">
              <label for="inputNama" class="col-lg-6 control-label">Nama</label>
              <div class="col-lg-12">
                <input class="form-control" id="inputNama" placeholder="Nama" name="nama" type="text" maxlength="50" required></div>
            </div>
            <div class="form-group">
              <label for="inputjenis" class="col-lg-6 control-label">Alamat</label>
              <div class="col-lg-12">
                <input class="form-control" id="inputjenis" placeholder="Alamat" name="spesialis" type="text" maxlength="50" required></div>
            </div>
            <div class="form-group">
              <div class="col-lg-12 col-lg-offset-6">
                <button type="reset" class="btn btn-default" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </div>
          </fieldset>
        </form>
        <!--END FORM MODAL--> </div>
    </div>
  </div>
</div>