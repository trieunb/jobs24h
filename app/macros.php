<?php 
HTML::macro('active', function($patterns, $class = 'active', $parameter = false)
{
	if (call_user_func_array(array('Route', 'is'), (array) $patterns))
	{
		if($parameter !== false) {
			if($parameter == Route::current()->parameters()['one']) {
				
				return $class;
			}
			else return '';
		}
		return $class;
	}

	return call_user_func_array(array('Request', 'is'), (array) $patterns) ? $class : '';
});
