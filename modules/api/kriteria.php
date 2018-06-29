<?php 

$query = $db->getAll("SELECT * FROM kriteria WHERE id");

pr($query);die();

api_ok($query);