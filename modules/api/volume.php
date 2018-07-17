<?php 

$query = $db->getAll("SELECT * FROM subkriteria WHERE id_kriteria=4");


api_ok($query);