<?php 

$query = $db->getAll("SELECT * FROM kriteria WHERE id");


api_ok($query);