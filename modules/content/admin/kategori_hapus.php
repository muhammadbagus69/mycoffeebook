<?php 
$id = @intval($_POST['id']);
$db->Execute('DELETE FROM `kategori` WHERE `id`='.$id);
