<?php 

$nama = @$_POST['nama'];
$kategori = @$_POST['kategori'];
$image = @$_POST['image'];
$deskripsi = $_POST['deskripsi'];
$idUser = @$_POST['iduser'];


$nameImage = '';
$move_upload = array();


if (!empty($nama) || !empty($image)) 
{
	$dir = _ROOT.'images/uploads/';
	$img_dir  = preg_replace('~^'.preg_quote(_URL, '~').'~s', _ROOT, $_POST['image']);

	if (file_exists($img_dir)) 
	{
		$nameImage = explode('/', $img_dir);
		$nameImage = end($nameImage);
		$move_upload['source'] = $img_dir;
		$move_upload['dest'] = $dir.$nameImage;
	}

	$insert = $db->Execute("INSERT INTO `resep` VALUES ('','$nama','$kategori','$namaImage','$deskripsi','$idUser',0)");
	if ($insert) 
	{
		rename($move_upload['source'], $move_upload['dest']);
		$id_resep = $db->insert_ID();
		$result = $db->getRow("SELECT * FROM `resep` WHERE `id`=$id_resep");

		$espresso = $_POST['espresso'];
		$campuran = $_POST['campuran'];
		$suhu = $_POST['suhu'];
		$volume = $_POST['volume'];
		$bubuk = $_POST['bubuk'];
		$alat = $_POST['alat'];

		$caraBuat = $_POST['cara_buat'];


    $insert_k = $db->Execute("INSERT INTO komposisi 
      VALUES('',$id_resep,$espresso),
      ('',$id_resep,$campuran),
      ('',$id_resep,$suhu),
      ('',$id_resep,$volume),
      ('',$id_resep,$bubuk),
      ('',$id_resep,$alat)");

    $howTo = implode(',', $caraBuat); 
    foreach ($howTo as $key => $buat) 
    {
      $urut = $key+1;
      $insert_p = $db->Execute("INSERT INTO pembuatan VALUES('',$id_resep,$urut,'$buat')");
    }
	}else{
		$result['message'] = "Gagal Menambahkan";
	}
}

api_ok($result);