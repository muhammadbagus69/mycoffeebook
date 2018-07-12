<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin Area</title>
    <link href="<?php echo _URL?>templates/admin/html/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo _URL?>templates/admin/html/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="<?php echo _URL?>templates/admin/html/dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="<?php echo _URL?>templates/admin/html/vendor/morrisjs/morris.css" rel="stylesheet">
    <link href="<?php echo _URL?>templates/admin/html/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script type="text/javascript">var _URL = "<?php echo _URL; ?>"</script>
  </head>
  <body>
    <div id="wrapper">
      <nav class="navbar navbar-inverse navbar-static-top" role="navigation" style="margin-bottom: 0;">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.html" style="color: #fff">MyCoffeeBook</a>
        </div>

        <ul class="nav navbar-top-links navbar-right">
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
              <i class="fa fa-user fa-fw" style="color: #00dcff"></i>
              <i class="fa fa-caret-down" style="color: #00dcff"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
              <li>
                <a href="<?php echo _URL; ?>admin/index.php?mod=content.logout" class="admin_link">
                  <i class="fa fa-sign-out fa-fw" style="color: black;"></i>
                  <span>Logout</span> 
                </a>
              </li>
            </ul>
          </li>
        </ul>
        <!-- /.navbar-top-links -->

        <div class="navbar-default sidebar" role="navigation">
          <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
              <li>
                <a href="<?php echo _URL; ?>admin/index.php?mod=content.list" class="admin_link">
                  <i class="fa fa-dashboard fa-fw"></i>
                  Dashboard
                </a>
              </li>
              <li>
                <a href="<?php echo _URL; ?>admin/index.php?mod=content.resep" class="admin_link">
                  <i class="fa fa-book fa-fw"></i>
                  Data Resep
                </a>
              </li>
              <li>
                <a href="<?php echo _URL; ?>admin/index.php?mod=content.user" class="admin_link">
                  <i class="fa fa-users fa-fw"></i>
                  Data Users
                </a>
              </li>
              <li>
                <a href="<?php echo _URL; ?>admin/index.php?mod=content.kategori" class="admin_link">
                  <i class="fa fa-tags fa-fw"></i>
                  Data Kategori
                </a>
              </li>
              <li>
                <a href="<?php echo _URL; ?>admin/index.php?mod=content.kriteria" class="admin_link">
                  <i class="fa fa-align-left fa-fw"></i>
                  Data Kriteria
                </a>
              </li>
              <li>
                <a href="<?php echo _URL; ?>admin/index.php?mod=content.subkriteria" class="admin_link">
                  <i class="fa fa-list-ol fa-fw"></i>
                  Data Sub Kriteria
                </a>
              </li>
              <li>
                <a href="<?php echo _URL; ?>admin/index.php?mod=content.nilaikriteria" class="admin_link">
                  <i class="fa fa-tasks fa-fw"></i>
                  Data Nilai Kriteria
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <div id="page-wrapper">
        <iframe src="#" style="width: 100%;height:570px;border:0;"></iframe>
      </div>
    </div>

    <script src="<? echo _URL?>templates/admin/html/vendor/jquery/jquery.min.js"></script>
    <script src="<? echo _URL?>templates/admin/html/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="<? echo _URL?>templates/admin/html/vendor/metisMenu/metisMenu.min.js"></script>
    <script src="<? echo _URL?>templates/admin/html/vendor/raphael/raphael.min.js"></script>
    <script src="<? echo _URL?>templates/admin/html/vendor/morrisjs/morris.min.js"></script>
    <script src="<? echo _URL?>templates/admin/html/data/morris-data.js"></script>
    <script src="<? echo _URL?>templates/admin/html/dist/js/sb-admin-2.js"></script>
  </body>
</html>

<script type="text/javascript">
  $(document).ready(function() {

    $('#page-wrapper').html('<iframe id="body_content" src="<?php echo _URL; ?>admin/index.php?mod=content.list" style="width: 100%;height:570px;border:0;"></iframe>');
    $(".admin_link").click(function(e){
      e.preventDefault();
      var a = $(this).attr('href');
      var e = document.createElement("div");
      $(e).attr('id', a);
      $('#page-wrapper').html(e);
      $(e).html('<iframe id="body_content" src="'+a+'" style="width: 100%;height:570px;border:0;"></iframe>');
      return false;
    }).css('cursor','pointer');
  });
</script>