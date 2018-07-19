<?php 

$id = $_GET['id'];

$query = $db->getAll('SELECT `nilai`,`subkriteria`,`id_kriteria` FROM komposisi AS z LEFT JOIN subkriteria AS x ON `z`.`id_subkriteria` = `x`.`id` WHERE `z`.`id_resep` ='.$id.' ORDER BY `x`.`id_kriteria` ASC');
$nama_resep = $db->getOne('SELECT nama FROM resep WHERE id = '.$id);

api_ok($query);