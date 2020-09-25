<?php
session_start();
require "wmv_core/config.php";
require "wmv_core/functions.php";
require "wmv_core/variables.php";
require "wmv_core/routers.php";

$request=array_diff(@explode("/", ltrim(strtok($_SERVER['REQUEST_URI'], "?"), '/')),array(""));

$slashcount=count($request)-1;

if (empty($request[0]) == FALSE){

	$i=0;
	foreach ($request as $value) {
		$endstr=$i==$slashcount?"":"/";
		$slash.=ltrim($value, '_').$endstr;
	$i++;
	}

	$router=$routers[trim($slash,'/')];

	$slash=empty($router)==FALSE?$router:$slash;

	$require = VIEW_FOLDER.$slash.'.php';
	
	if (@file_exists($require) == TRUE){
		require $require;
	}else {
		$require = @file_exists(VIEW_FOLDER.ERROR_PAGE)==""?die(ERROR_WORD):VIEW_FOLDER.ERROR_PAGE;
		require $require;
	}

}else {
	$require = @file_exists(VIEW_FOLDER.DEFAULT_INDEX)==""?die(ERROR_WORD):VIEW_FOLDER.DEFAULT_INDEX;
	require $require;
}

?>