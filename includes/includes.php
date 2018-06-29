<?php

if (!defined('_ROOT')) define('_INC'		, dirname(__FILE__).'/');
else	define('_INC'		, _ROOT.'includes/');
define('_CLASS'	, _INC.'class/');
// define('_CONF'	, _INC.'config/');
define('_FUNC'	, _INC.'function/');
// define('_LIB'		, _INC.'lib/');
// define('_SYS'		, _INC.'system/');
if (!defined('_CACHE'))
define('_CACHE', _ROOT.'images/cache/');