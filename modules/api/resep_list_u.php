<?php 
	
	$id = $_GET['id'];
	$ok = 0;
	$msg = '';
	$detail = array();

	if (!empty($id)) 
	{
		$query = $db->getAll("SELECT * FROM `resep` WHERE `id_user`='$id'");
		
		foreach ($query as $key => $value) 
		{
			$query[$key]['image'] = img_show($value['image']);
			$id_kat = $query[$key]['id_kategori'];
			$kat = $db->getAll("SELECT * FROM `kategori` WHERE `id`='$id_kat'");
			foreach ($kat as $key => $kvalue) 
			{
				$kat[$key]['image'] = img_show($kvalue['image']);
			}
		}

		if ($query) 
		{
			$detail = $query;

		  
		  $ok = 1;
		  $msg = 'Success' ;
		}else{
			$msg = 'Resep Kosong';
		}

	}else{
		$msg = "Failed to access";
	}

api_ok(
	array(
			'ok'				=> $ok,
			'message' 	=> $msg,
			'resep'			=> $detail,
			'kategori'	=> $kat,
		)
	);