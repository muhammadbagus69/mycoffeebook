<?php 

// $query = $db->getAll("SELECT  `kategori`.`kategori` ,  `resep`.`nama` ,  `resep`.`image` 
// 											FROM  `resep` 
// 											LEFT JOIN kategori ON  `kategori`.`id` =  `resep`.`id_kategori` 
// 											ORDER BY  `kategori`.`kategori`");

$query = $db->getAll("SELECT * FROM resep WHERE status='1' LIMIT 7");
foreach ($query as $key => $value) 
{
	$query[$key]['image'] = img_show($value['image']);
}

api_ok($query);		