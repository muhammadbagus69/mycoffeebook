<?php 
$id = @intval($_POST['id']);
$db->Execute('DELETE FROM `subkriteria` WHERE `id`='.$id);
