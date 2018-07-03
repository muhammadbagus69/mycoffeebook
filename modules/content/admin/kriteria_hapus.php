<?php 
$id = @intval($_POST['id']);
$db->Execute('DELETE FROM `kriteria` WHERE `id`='.$id);
