<?php 
HTML::macro('active', function($patterns, $class = 'active-menu')
{
	if (call_user_func_array(array('Route', 'is'), (array) $patterns))
	{
		return $class;
	}

	return call_user_func_array(array('Request', 'is'), (array) $patterns) ? $class : '';
});