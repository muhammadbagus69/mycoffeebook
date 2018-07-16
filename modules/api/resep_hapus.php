<?php 

$id = $_GET['id'];

$delete = $db->Execute("DELETE FROM `resep` WHERE `id` = $id");

api_ok($delete);