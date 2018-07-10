<?php 
$img = _class('images');
$date = date('Y/m/d/h/');
$img->setPath(_CACHE.'temp/'.$date);
$name = $img->upload(@$_FILES['image']);

$imagef = array('jpg','jpeg','png','gif','bmp');
if (in_array(strtolower($img->getExt($name)), $imagef)) $img->resize(900);

if (!empty($name)) 
{
	$image = preg_replace('~^'.preg_quote(_ROOT,'~').'~s', _URL, _CACHE.'temp/'.$date.$name);
}else $image = '';

api_ok($image);