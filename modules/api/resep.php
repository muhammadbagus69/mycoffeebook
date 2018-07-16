<?php 

$ok = 0;
$msg = '';
$resep = array();

$query = $db->getAll("SELECT * FROM resep WHERE status='1' LIMIT 7");
foreach ($query as $key => $value) 
{
	$query[$key]['image'] = img_show($value['image']);
}

if ($query) 
{
	$resep = $query;
  $ok = 1;
  $msg = 'Success' ;
}else{
	$msg = 'Resep Kosong';
}

api_ok(
	array(
			'ok'			=> $ok,
			'message' => $msg,
			'resep'		=> $resep
		)
	);