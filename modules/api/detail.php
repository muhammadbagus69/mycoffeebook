<?php 

$data = $db->getAll('SELECT * FROM user WHERE 1');

$out = array($data);
api_ok($out);
