<?php 
$id = @intval($_POST['id']);
$db->Execute('DELETE FROM `user` WHERE `id`='.$id);
