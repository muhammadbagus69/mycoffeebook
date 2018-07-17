<?php 

$query = $db->getAll("SELECT * FROM nilai ORDER BY id DESC");


api_ok($query);