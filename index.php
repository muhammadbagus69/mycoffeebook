<?php
include_once __DIR__.'/config.php';
include_once _ROOT.'function.php';
include_once _ROOT.'includes/includes.php';

ob_start('ob_gzhandler');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
header('Access-Control-Allow-Credentials: true');
$is_api       = $task   = '';
$MST->stop    = true;
$MST->content = '';
$db           = getDB();
$output       = array(
	'ok'      => 0,
	'message' => 'failed to access',
	'result'  => array()
);

if (preg_match('~^(?:www\.)?api\.~is', @$_SERVER['HTTP_HOST']))
{
	$is_api        = 1;
	$_seo          = array();
	$_seo['break'] = false;
	$_seo['URI']   = preg_replace('#^'._URI.'#is', '', @$_SERVER['REQUEST_URI']);
	$_URI          = explode('/', $_seo['URI']);
	if (!empty($_URI))
	{
		$_URI = array_values($_URI);
		$task = preg_replace('~[^a-z0-9\-_]+~', '_', strtolower($_URI[0]));// diamankan dari orang nakal
	}
	if (empty($task))
	{
		$task = 'main';
	}

	if (file_exists(_ROOT.'modules/api/'.$task.'.php'))
	{
		ob_start();
		_func('api');
		include _ROOT.'modules/api/'.$task.'.php';
		$MST->content = ob_get_contents();
		ob_end_clean();
		$MST->stop = false;
	}else{
		$MST->content = 'Maaf, menu "'.$task.'" tidak di temukan';
		$MST->stop = false;
	}
	output_json($output);
}else{
	if (preg_match('~^'._URI.'([^\?]+)(?:\?.*?)?$~is', @$_SERVER['REQUEST_URI'], $match))
	{
		session_start();
		$_META = array();
		$_URI  = explode('/', $match[1]);
		$task  = preg_replace('~[^a-z0-9\-_]+~', '_', strtolower($_URI[0]));// diamankan dari orang nakal
		$_URI  = array_values($_URI);
		$out   = array();
		$mod   = $_URI[0];
		$task  = @$_URI[1];

		if (file_exists(_ROOT.'modules/'.$mod.'/'.$task.'.php'))
		{
			ob_start();
			include _ROOT.'modules/'.$mod.'/'.$task.'.php';
			$MST->content = ob_get_contents();
			ob_end_clean();
		}else{
			$MST->content = 'Maaf, menu "'.$task.'" tidak di temukan';
		}

		include _ROOT.'templates/'._TMP.'/index.php';
	}else{
		include _ROOT.'templates/'._TMP.'/index.php';
	}

	if ($MST->stop)
	{
		die();
	}
}
