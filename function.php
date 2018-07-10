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


function _class($file)
{
	global $MST;
	if(!empty($file))
	{
		$class = preg_replace('~\.php~s', '', $file);
		if(isset($MST->$class) && $MST->$class != false && func_num_args()==1) return $MST->$class;
		_ext($file);
		$filename = '';
		if(file_exists(_ROOT.'modules/'.str_replace('.php', '/_class.php', $file)))
		{
		  $filename = _ROOT.'modules/'.str_replace('.php', '/_class.php', $file);
		  $class .= '_class';
		}else
		if(is_file(_CLASS.$file))
		{
		  $filename = _CLASS.$file;
		}
		if(!empty($filename))
		{
			include_once $filename;
			if (class_exists($class))
			{
				$j = func_num_args();
				if($j > 1)
				{
					$l = array();
					for($i=1;$i < $j;$i++)
					{
						$k = 'l'.$i;
						$$k = func_get_arg($i);
						$l[] = '$'.$k;
					}
					eval('$MST->'.$class.' = new '.$class.'('.implode(',', $l).');');
				}else{
					$MST->$class = new $class();
				}
			}else $MST->$class = false;
		}
	}
	return !empty($MST->$class) ? $MST->$class : false;
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
  	// $filename = urlencode($filename);
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

function image($file, $sizes = '', $attr='')
{
	$path_file= '';
	$path_url	= '';
	if(preg_match('~^(?:ht|f)tps?://~is', $file))
	{
		$tmp = str_replace(_URL, _ROOT, $file);
		if(!preg_match('~^(?:ht|f)tps?://~is', $tmp))
		{
			if(is_file($tmp))
			{
				$path_file = $tmp;
			}else{
				return false;
			}
		}
		$path_url = $file;
	}else{
		if(is_file($file))
		{
			$path_file= $file;
			$path_url	= str_replace(_ROOT, _URL, $file);
		}else
		if(is_file(_ROOT.$file))
		{
			$path_file= _ROOT.$file;
			$path_url	= _URL.$file;
		}else{
			return false;
		}
	}
	if(preg_match('~\.swf$~is', $path_file))
	{
		list($width, $height) = image_size($sizes);
		$width	= $width ? $width : 200;
		$height = $height ? $height : 200;
		$output =	 '<object type="application/x-shockwave-flash" data="'.$path_url.'" width="'.$width.'" height="'.$height.'"'.$attr.'>'."\n";
		$output .= '	<param name="movie" value="'.$path_url.'">'."\n";
		$output .= '	<param name="menu" value="false">'."\n";
		$output .= '	<param name="wmode" value="transparent">'."\n";
		$output .= "</object>";
	}else{
		$sizes2 = image_size($sizes, true);
		if(empty($path_file))
		{
			$sizes = $sizes2;
		}else{
			$sizes1 = getimagesize($path_file);
			$sizes	= array();
			if($sizes1[0] > $sizes2[0])
			{
				if($sizes1[0] > $sizes1[1])
				{
					$sizes[0] = $sizes2[0];
					$sizes[1] = $sizes2[0]*$sizes1[1]/$sizes1[0];
				}else{
					$sizes[1] = $sizes2[1];
					$sizes[0] = $sizes2[1]*$sizes1[0]/$sizes1[1];
				}
			}else{
				$sizes = $sizes1;
			}
		}
		$attr .= $sizes[0] ? ' width="'.$sizes[0].'"' : '';
		$attr .= $sizes[1] ? ' height="'.$sizes[1].'"' : '';
		$output = '<img src="'.$path_url.'"'.$attr.' />';
	}
	return $output;
}

function image_size($sizes, $in_resize = false)
{
	if(empty($sizes)) return array(0,0);
	if(is_array($sizes))
	{
		$output = array_values($sizes);
		if(!isset($output[1])||!$output[1]) $output[1] = 0;
	}else{
		preg_match('~([0-9]+)[x\*\,]?([0-9]+)?~', $sizes, $match);
		$output[] = $match[1];
		$output[] = (@intval($match[2]) > 0) ? $match[2] : 0;
	}
	if($in_resize && !$output[1]) $output[1] = $output[0];
	return $output;
}

function image_transform($x,$y,$x1,$y1)
{
  $input_landscape  = ($x > $y) ? true : false;
  $output_landscape = ($x1 > $y1) ? true : false;
  $x2 = $y2 = 0;
  if($input_landscape)
  {
    if($output_landscape)
    {
      $x2 = $x1;
      $y2 = ceil($y/$x*$x2);
    }else{
      $y2 = $y1;
      $x2 = ceil($y/$x*$y2);
    }
  }else{
    if($output_landscape)
    {
      $x2 = $x1;
      $y2 = ceil($y/$x*$x2);
    }else{
      $x2 = $x1;
      $y2 = ceil($y/$x*$x2);
    }
  }
  return array($x2,$y2);
}