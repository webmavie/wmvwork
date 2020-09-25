<?php
session_start();
require "wmv_core/config.php";
require "wmv_core/functions.php";
require "wmv_core/variables.php";
require "wmv_core/routers.php";

$request=array_diff(@explode("/", ltrim(strtok($_SERVER['REQUEST_URI'], "?"), '/')),array(""));

$trimmed=trim(trim(SITE_URL, "https://"), "http://");
if (strpos($trimmed, "/")) {
   	$exp=explode("/", $trimmed);
    if (empty(trim($exp[1]))==FALSE){
        $script_dir=count($exp)-1;
        for ($i=0; $i < $script_dir ; $i++) { 
			unset($request[$i]);
			$request=array_values(array_filter($request));
		}
    }
}

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
