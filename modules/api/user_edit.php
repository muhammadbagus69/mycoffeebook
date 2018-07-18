<?php

$id = @intval($_POST['id']);
$nama = @$_POST['nama'];
$alamat = @$_POST['alamat'];
$foto = @$_POST['foto'];
$name = '';
$move_upload = array();
if (!empty($nama) && !empty($alamat)) 
{
	$dir = _ROOT.'images/uploads/';
	// $url = $foto;
	// $img_dir = _CACHE.'temp/'.$url;
	$img_dir  = preg_replace('~^'.preg_quote(_URL, '~').'~s', _ROOT, $_POST['foto']);

	if (file_exists($img_dir)) 
	{
		$name = explode('/', $img_dir);
		$name = end($name);
		$move_upload['source'] = $img_dir;
		$move_upload['dest'] = $dir.$name;
	}
	// pr($move_upload, __FILE__.':'.__LINE__);die();

	$update = $db->Execute("UPDATE `user` SET `nama`='$nama', `alamat`='$alamat', `foto`='$name' WHERE `id`=$id");
	if (@$update) 
	{
		rename($move_upload['source'], $move_upload['dest']);
		$user = $db->getRow("SELECT * FROM `user` WHERE `id`=$id");
		$user['foto'] = img_show($name);
	}else{
		$user['message'] = "Ubah Data Gagal";
	}
}

api_ok($user);