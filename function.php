<?php

if (!function_exists('pr'))
{
	function pr($text='', $return = false)
	{
		$is_multiple = (func_num_args() > 2) ? true : false;
		if(!$is_multiple)
		{
			if(is_numeric($return))
			{
				if($return==1 || $return==0)
				{
					$return = $return ? true : false;
				}else $is_multiple = true;
			}
			if(!is_bool($return)) $is_multiple = true;
		}
		if($is_multiple)
		{
			echo "<pre>\n";
			echo "<b>1 : </b>";
			print_r($text);
			$i = func_num_args();
			if($i > 1)
			{
				$j = array();
				$k = 1;
				for($l=1;$l < $i;$l++)
				{
					$k++;
					echo "\n<b>$k : </b>";
					print_r(func_get_arg($l));
				}
			}
			echo "\n</pre>";
		}else{
			if($return)
			{
				ob_start();
			}
			echo "<pre>\n";
			print_r($text);
			echo "\n</pre>";
			if($return)
			{
				$output = ob_get_contents();
				ob_end_clean();
				return $output;
			}
		}
	}
}
function file_read($file = '', $method = 'r')
{
	if ( ! file_exists($file))
	{
		return FALSE;
	}
	if (function_exists('file_get_contents'))
	{
		return file_get_contents($file);
	}
	if ( ! $fp = @fopen($file, $method))
	{
		return FALSE;
	}
	flock($fp, LOCK_SH);
	$data = '';
	if (filesize($file) > 0)
	{
		$data =& fread($fp, filesize($file));
	}
	flock($fp, LOCK_UN);
	fclose($fp);
	return $data;
}
function file_write($path, $data='', $mode = 'w+')
{
	if(!file_exists(dirname($path)))
	{
		path_create(dirname($path));
	}
	if ( ! $fp = @fopen($path, $mode))
	{
		return FALSE;
	}
	flock($fp, LOCK_EX);
	fwrite($fp, $data);
	flock($fp, LOCK_UN);
	fclose($fp);
	@chmod($path, 0777);
	return TRUE;
}
function path_create($path, $chmod = 0777)
{
	if(!empty($path))
	{
		if(file_exists($path)) $output = true;
		else {
			$path = preg_replace('~^'.addslashes(_ROOT).'~', '', $path);
			$path = preg_replace('~^'.addslashes(_URL).'~', '', $path);
			$tmp_dir = _ROOT;
			$r = explode('/', $path);
			foreach($r AS $dir)
			{
				$tmp_dir .= $dir.'/';
				if(!file_exists($tmp_dir))
				{
					if(mkdir($tmp_dir, $chmod))
					{
						chmod($tmp_dir, $chmod);
					}
				}
			}
			$output = file_exists($tmp_dir);
		}
	}else{
		$output = false;
	}
	return $output;
}
function output_json($array)
{
	$output = '{}';
	if (!empty($array))
	{
		if (!is_array($array))
		{
			$output = $array;
		}else{
			if (defined('JSON_PRETTY_PRINT'))
			{
				$output = json_encode($array, JSON_PRETTY_PRINT);
			}else{
				$output = json_encode($array);
			}
		}
	}
	header('content-type: application/json; charset: UTF-8');
	header('cache-control: must-revalidate');
	// header('expires: ' . gmdate('D, d M Y H:i:s', time() + 31536000) . ' GMT'); // untuk cache data api
	echo $output;
	exit();
}
function _func($file)
{
	if(!empty($file))
	{
		_ext($file);
		$path = str_replace('.php', '', $file);
		$files= array();
		if(file_exists(_ROOT.'modules/'.$path.'/_function.php'))
		{
			$f = $files[] = _ROOT.'modules/'.$path.'/_function.php';
		  include_once $f;
		}
		if(is_file(_FUNC.$file))
		{
			$f = $files[] = _FUNC.$file;
			include_once $f;
		}
		$j = func_num_args();
		if ($j > 1)
		{
			$func = $path.'_'.func_get_arg(1);
			if (function_exists($func))
			{
				if ($j > 2)
				{
					$param = array();
					for($i=2;$i < $j;$i++)
					{
						$param[] = func_get_arg($i);
					}
					return call_user_func_array($func, $param);
				}else{
					return $func();
				}
			}else{
				$msg = 'Function "'.$func.'" not found';
				if (!empty($files)) {
					$msg .= ' in '.implode(' and ', $files);
				}
				die($msg.' !');
			}
		}
	}
}
function _ext(&$file, $ext = '.php')
{
	if(substr($file, (strlen($ext)*-1)) != $ext) $file .= $ext;
}


function getDB($dbID=0)
{
	$i = ($dbID > 0) ? $dbID : '';
	if (isset($GLOBALS['db'.$i]))
	{
		return $GLOBALS['db'.$i];
	}else{
		include_once _ROOT.'includes/class/sql.php';
		$d = $GLOBALS['_DB'][$dbID];
		$GLOBALS['db'.$i] = new sql();
		$ifconn	= $GLOBALS['db'.$i]->Connect($d['SERVER'], $d['USERNAME'], $d['PASSWORD'], $d['DATABASE']);
		if (!$ifconn){
			die('Error while connecting to Database "'.$d['DATABASE'].'" on Server');
		}
		unset($GLOBALS['_DB'][$dbID]);
		return $GLOBALS['db'.$i];
	}
}

function img_show($filename='')
{
	if (empty($filename))
  {
    $p = 'images/uploads/no_user.png';
  }else{
  	$p = 'images/uploads/'.$filename; 
  }

  $dir = _ROOT.$p;
  if(!file_exists($dir) || !is_file($dir))
  {
    $p = 'images/uploads/no_user.png';
    $dir = _ROOT.$p;
  }
  
  if (is_file($dir))
  {
   $img = _URL.$p;
  }
  return $img;
}