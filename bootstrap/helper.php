<?php 

if(!function_exists('ceshi')){
	function ceshi ()
	{
		echo '异常。。。';
	}
}

function myfunction($v1, $v2)
{
	// var_dump($v1);
	// var_dump($v2);die;
    return $v1 . "-" . $v2;
}


