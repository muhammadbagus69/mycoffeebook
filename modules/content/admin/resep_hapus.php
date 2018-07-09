<?php 
$id = @intval($_POST['id']);
$db->Execute('DELETE FROM `resep` WHERE `id`='.$id);
