<?php
/**
PHP redirection script
*/
$destination = "https://code-experience.fr/"; // IMPORTANT: $destination NEEDS to finish within /

$url = explode('/',$_SERVER['REQUEST_URI']);
foreach($url as $key => $part){
    if($part==''){
        unset($url[$key]);
    }
}
$url = implode('/',$url);

// array of redirections
// $key = source / $value = destination
$urlCorrespondences = array();

// example = you can modify and add your redirections here
//$urlCorrespondences['/directory/index.php'] = "/index.php";
//$urlCorrespondences['/file.php'] = "/file2.php";
$urlCorrespondences['/'] = "";

foreach ($urlCorrespondences as $key=>$value) {
	$position = strpos($url, $key);
	if ($position === false) {
		// Not found
		$get = isset($get)?true:false;
		$url = $url.($get?"?".http_build_query($_GET):"");
	} else {
		$url = $value;
	}
} // end foreach

header("HTTP/1.1 301 Moved Permanently"); 
header('Location:'.$destination.$url);
exit();
