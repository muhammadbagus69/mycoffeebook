<?php 

$query = $db->getAll("SELECT * FROM kategori WHERE id");

foreach ($query as $key => $value) 
{
	$query[$key]['image'] = img_show($value['image']);
	$query[$key]['url'] = _URL.'detail_kategori?id='.$value['id'];
}

api_ok($query);