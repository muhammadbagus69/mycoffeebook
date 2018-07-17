<?php 

$query = $db->getAll("SELECT * FROM subkriteria WHERE id_kriteria=6");


api_ok($query);