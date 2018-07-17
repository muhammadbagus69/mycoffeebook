<?php 

$query = $db->getAll("SELECT * FROM subkriteria WHERE id_kriteria=2");


api_ok($query);