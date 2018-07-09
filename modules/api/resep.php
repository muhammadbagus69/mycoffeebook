<?php 

$query = $db->getAll("SELECT  `kategori`.`kategori` ,  `resep`.`nama` ,  `resep`.`image` ,  `resep`.`komposisi` ,  `resep`.`pembuatan` 
											FROM  `resep` 
											LEFT JOIN kategori ON  `kategori`.`id` =  `resep`.`id_kategori` 
											ORDER BY  `kategori`.`kategori`");
api_ok($query);		