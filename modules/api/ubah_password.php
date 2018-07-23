<?php

$id = @intval($_POST['id']);
$oldPass = @$_POST['oldPass'];
$newPass = @$_POST['newPass'];

if (!empty($id) && !empty($newPass)) 
{
	$update = $db->Execute("UPDATE `user` SET `password`='$newPass' WHERE `id`=$id");

	if ($update) 
	{
		$query = $db->getRow("SELECT * FROM `user` WHERE `id`=$id");
	}
}

api_ok($query);