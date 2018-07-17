<?php 

$query = $db->getAll("SELECT * FROM subkriteria WHERE id_kriteria=1");


api_ok($query);