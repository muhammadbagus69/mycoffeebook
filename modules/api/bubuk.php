<?php 

$query = $db->getAll("SELECT * FROM subkriteria WHERE id_kriteria=5");


api_ok($query);