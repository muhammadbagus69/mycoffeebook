<?php 

$MST = new stdClass();
define( '_ADMIN', 'admin/' );
include_once '../config.php';
include_once _ROOT.'function.php';
include_once _ROOT.'includes/includes.php';

session_start();
// $_SESSION['admin_id'] = '';
$admin_id  = @intval($_SESSION['admin_id']);
$db           = getDB();

if(!empty($_POST))
{
	if(preg_match('~^demo\.~is', @$_SERVER['HTTP_HOST']))
	{
		if(count($_POST) > 1 && empty($_POST['login']))
		{
			@unlink(_ROOT.'images/cache/tmp.html');
		}
	}
}


if (!empty($_GET['mod']))
{
	if (preg_match('~^'._URI.'([^\?]+)(?:\?(.*?))?$~is', @$_SERVER['REQUEST_URI'], $match))
	{
		$_uri = explode('.', $_GET['mod']);
		$mod  = $_uri[0];
		$task = @$_uri[1];
		if (file_exists(_ROOT.'modules/'.$mod.'/admin/'.$task.'.php'))
		{
			ob_start();
			include _ROOT.'modules/'.$mod.'/admin/'.$task.'.php';
			$MST->content = ob_get_contents();
			ob_end_clean();
		}else{
			$MST->content = 'Maaf, menu "'.$task.'" tidak di temukan';
		}
	}

	$out = array();
	include_once(_ROOT.'templates/admin/index-content.php');
}else{
	if (!empty($admin_id))
	{
		include_once(_ROOT.'templates/admin/index.php');
	}else{
		include_once(_ROOT.'templates/admin/index-login.php');
	}
}

