<?php 

function api_ok($value, $is_ok = 1)
{
	global $output;
	if (empty($value))
	{
		$is_ok = 0;
	}
	if (is_array($value))
	{
		if (isset($value['ok']) && isset($value['message']) && isset($value['result']))
		{
			$output = $value;
		}else{
			$out = array('ok' => $is_ok);
			if (isset($value['ok']))
			{
				$out['ok'] = $value['ok'] ? 1 : 0;
				unset($value['ok']);
			}
			if ($out['ok'])
			{
				$out['message'] = 'success';
			}
			if (isset($value['message']))
			{
				$out['message'] = $value['message'];
				unset($value['message']);
			}
			if (isset($value['result']))
			{
				$out['result'] = $value['result'];
			}else{
				$out['result'] = $value;
			}
			$output = array_merge($output, $out);
		}
	}else{
		$output = array(
			'ok'      => $is_ok,
			'message' => $is_ok ? 'success' : (is_string($value) ? $value : (!empty($output['message']) ? $output['message'] : 'failed')),
			'result'  => $is_ok ? $value : ''
			);
	}
	$output['result'] = $output['result'];
}

function api_no($value)
{
	api_ok($value, 0);
}

function api_url($task='')
{
	return _URL.$task;
}
