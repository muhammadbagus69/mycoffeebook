<?php 

$query = $db->getAll("SELECT * FROM subkriteria WHERE id_kriteria=3");


api_ok($query);