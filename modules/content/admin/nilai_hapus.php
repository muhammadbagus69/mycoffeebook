<?php 
$id = @intval($_POST['id']);
$db->Execute('DELETE FROM `nilai` WHERE `id`='.$id);
