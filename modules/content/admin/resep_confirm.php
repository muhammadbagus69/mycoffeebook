<?php 
$id = @intval($_POST['id']);

$status = $db->getOne("SELECT `status` FROM `resep` WHERE id=$id");

$now = $status == 1 ? 0 : 1;

$db->Execute('UPDATE `resep` SET `status`='.$now.' WHERE `id`='.$id);
