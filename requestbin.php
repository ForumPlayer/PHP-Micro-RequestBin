<?php
header('Access-Control-Allow-Origin: *');
$query = $_SERVER["QUERY_STRING"];
$file = "log.txt";
$current = file_get_contents($file);
function keepLines($str, $num=10) {
    $lines = explode("\n", $str);
    $firsts = array_slice($lines, 0, $num);
    return implode("\n", $firsts);
}
if ($query == "inspect") {
	/*echo str_replace("\n", "<br>", $current);*/
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<title>Micro RequestBin</title>
<style type='text/css'>
    * {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    padding: 0; 
    margin: 0; 
}
body {
    background-color: #0099cc;
    color: #ffffff;
    font-size: 180%;
    margin: 10px;
}
.centre {
    text-align: center;
}
textarea {  /* position is inherited */
    left: 0; 
    top: 0; 
    right: 0;
    bottom: 100px;  /* Actually the height of select and input */
    width: 100%;
}
</style>
</head>
<body>
<div class="centre">
<textarea name="paste" rows="50"><?php echo "$current" ?></textarea>
</div>
</body>
</html>
<?php } else if ($query == "clear") {
	file_put_contents($file, "");
	header("Location: ?inspect");
	exit();
} else { 
	$postdata = file_get_contents("php://input");
	$newlog = "Datetime: ".date('Y-m-d H:i:s')."\n";
	$newlog .= "Query: ".$query."\n";
	$newlog .= "IP: ".$_SERVER['REMOTE_ADDR']."\n";
	$newlog .= "URI: ".$_SERVER['REQUEST_URI']."\n";
	$newlog .= "Method: ".$_SERVER["REQUEST_METHOD"]."\n";
	$newlog .= "-------Header:------\n";
	foreach (getallheaders() as $name => $value) {
		$newlog .= "$name: $value\n";
	}
	$newlog .= "--------Body:-------\n".$postdata;
	$newlog .= "\n---------End--------\n\n";
	$current = $newlog.$current;
	$current = keepLines($current, 700);
	file_put_contents($file, $current);
	header($_SERVER["SERVER_PROTOCOL"]." 200 OK");
	echo "OK ?inspect";
	exit();
}
function movePage($num,$url){
   static $http = array (
       100 => $_SERVER["SERVER_PROTOCOL"]." 100 Continue",
       101 => $_SERVER["SERVER_PROTOCOL"]." 101 Switching Protocols",
       200 => $_SERVER["SERVER_PROTOCOL"]." 200 OK",
       201 => $_SERVER["SERVER_PROTOCOL"]." 201 Created",
       202 => $_SERVER["SERVER_PROTOCOL"]." 202 Accepted",
       203 => $_SERVER["SERVER_PROTOCOL"]." 203 Non-Authoritative Information",
       204 => $_SERVER["SERVER_PROTOCOL"]." 204 No Content",
       205 => $_SERVER["SERVER_PROTOCOL"]." 205 Reset Content",
       206 => $_SERVER["SERVER_PROTOCOL"]." 206 Partial Content",
       300 => $_SERVER["SERVER_PROTOCOL"]." 300 Multiple Choices",
       301 => $_SERVER["SERVER_PROTOCOL"]." 301 Moved Permanently",
       302 => $_SERVER["SERVER_PROTOCOL"]." 302 Found",
       303 => $_SERVER["SERVER_PROTOCOL"]." 303 See Other",
       304 => $_SERVER["SERVER_PROTOCOL"]." 304 Not Modified",
       305 => $_SERVER["SERVER_PROTOCOL"]." 305 Use Proxy",
       307 => $_SERVER["SERVER_PROTOCOL"]." 307 Temporary Redirect",
       400 => $_SERVER["SERVER_PROTOCOL"]." 400 Bad Request",
       401 => $_SERVER["SERVER_PROTOCOL"]." 401 Unauthorized",
       402 => $_SERVER["SERVER_PROTOCOL"]." 402 Payment Required",
       403 => $_SERVER["SERVER_PROTOCOL"]." 403 Forbidden",
       404 => $_SERVER["SERVER_PROTOCOL"]." 404 Not Found",
       405 => $_SERVER["SERVER_PROTOCOL"]." 405 Method Not Allowed",
       406 => $_SERVER["SERVER_PROTOCOL"]." 406 Not Acceptable",
       407 => $_SERVER["SERVER_PROTOCOL"]." 407 Proxy Authentication Required",
       408 => $_SERVER["SERVER_PROTOCOL"]." 408 Request Time-out",
       409 => $_SERVER["SERVER_PROTOCOL"]." 409 Conflict",
       410 => $_SERVER["SERVER_PROTOCOL"]." 410 Gone",
       411 => $_SERVER["SERVER_PROTOCOL"]." 411 Length Required",
       412 => $_SERVER["SERVER_PROTOCOL"]." 412 Precondition Failed",
       413 => $_SERVER["SERVER_PROTOCOL"]." 413 Request Entity Too Large",
       414 => $_SERVER["SERVER_PROTOCOL"]." 414 Request-URI Too Large",
       415 => $_SERVER["SERVER_PROTOCOL"]." 415 Unsupported Media Type",
       416 => $_SERVER["SERVER_PROTOCOL"]." 416 Requested range not satisfiable",
       417 => $_SERVER["SERVER_PROTOCOL"]." 417 Expectation Failed",
       500 => $_SERVER["SERVER_PROTOCOL"]." 500 Internal Server Error",
       501 => $_SERVER["SERVER_PROTOCOL"]." 501 Not Implemented",
       502 => $_SERVER["SERVER_PROTOCOL"]." 502 Bad Gateway",
       503 => $_SERVER["SERVER_PROTOCOL"]." 503 Service Unavailable",
       504 => $_SERVER["SERVER_PROTOCOL"]." 504 Gateway Time-out"
   );
   header($http[$num]);
   header ("Location: $url");
}
?><?php
header('Access-Control-Allow-Origin: *');
$query = $_SERVER["QUERY_STRING"];
$file = "log.txt";
$current = file_get_contents($file);
function keepLines($str, $num=10) {
    $lines = explode("\n", $str);
    $firsts = array_slice($lines, 0, $num);
    return implode("\n", $firsts);
}
if ($query == "inspect") {
	/*echo str_replace("\n", "<br>", $current);*/
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<title>Micro RequestBin</title>
<style type='text/css'>
    * {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    padding: 0; 
    margin: 0; 
}
body {
    background-color: #0099cc;
    color: #ffffff;
    font-size: 180%;
    margin: 10px;
}
.centre {
    text-align: center;
}
textarea {  /* position is inherited */
    left: 0; 
    top: 0; 
    right: 0;
    bottom: 100px;  /* Actually the height of select and input */
    width: 100%;
}
</style>
</head>
<body>
<div class="centre">
<textarea name="paste" rows="50"><?php echo "$current" ?></textarea>
</div>
</body>
</html>
<?php } else if ($query == "clear") {
	file_put_contents($file, "");
	header("Location: ?inspect");
	exit();
} else { 
	$postdata = file_get_contents("php://input");
	$newlog = "Datetime: ".date('Y-m-d H:i:s')."\n";
	$newlog .= "Query: ".$query."\n";
	$newlog .= "IP: ".$_SERVER['REMOTE_ADDR']."\n";
	$newlog .= "URI: ".$_SERVER['REQUEST_URI']."\n";
	$newlog .= "Method: ".$_SERVER["REQUEST_METHOD"]."\n";
	$newlog .= "-------Header:------\n";
	foreach (getallheaders() as $name => $value) {
		$newlog .= "$name: $value\n";
	}
	$newlog .= "--------Body:-------\n".$postdata;
	$newlog .= "\n---------End--------\n\n";
	$current = $newlog.$current;
	$current = keepLines($current, 700);
	file_put_contents($file, $current);
	header($_SERVER["SERVER_PROTOCOL"]." 200 OK");
	echo "OK ?inspect";
	exit();
}
function movePage($num,$url){
   static $http = array (
       100 => $_SERVER["SERVER_PROTOCOL"]." 100 Continue",
       101 => $_SERVER["SERVER_PROTOCOL"]." 101 Switching Protocols",
       200 => $_SERVER["SERVER_PROTOCOL"]." 200 OK",
       201 => $_SERVER["SERVER_PROTOCOL"]." 201 Created",
       202 => $_SERVER["SERVER_PROTOCOL"]." 202 Accepted",
       203 => $_SERVER["SERVER_PROTOCOL"]." 203 Non-Authoritative Information",
       204 => $_SERVER["SERVER_PROTOCOL"]." 204 No Content",
       205 => $_SERVER["SERVER_PROTOCOL"]." 205 Reset Content",
       206 => $_SERVER["SERVER_PROTOCOL"]." 206 Partial Content",
       300 => $_SERVER["SERVER_PROTOCOL"]." 300 Multiple Choices",
       301 => $_SERVER["SERVER_PROTOCOL"]." 301 Moved Permanently",
       302 => $_SERVER["SERVER_PROTOCOL"]." 302 Found",
       303 => $_SERVER["SERVER_PROTOCOL"]." 303 See Other",
       304 => $_SERVER["SERVER_PROTOCOL"]." 304 Not Modified",
       305 => $_SERVER["SERVER_PROTOCOL"]." 305 Use Proxy",
       307 => $_SERVER["SERVER_PROTOCOL"]." 307 Temporary Redirect",
       400 => $_SERVER["SERVER_PROTOCOL"]." 400 Bad Request",
       401 => $_SERVER["SERVER_PROTOCOL"]." 401 Unauthorized",
       402 => $_SERVER["SERVER_PROTOCOL"]." 402 Payment Required",
       403 => $_SERVER["SERVER_PROTOCOL"]." 403 Forbidden",
       404 => $_SERVER["SERVER_PROTOCOL"]." 404 Not Found",
       405 => $_SERVER["SERVER_PROTOCOL"]." 405 Method Not Allowed",
       406 => $_SERVER["SERVER_PROTOCOL"]." 406 Not Acceptable",
       407 => $_SERVER["SERVER_PROTOCOL"]." 407 Proxy Authentication Required",
       408 => $_SERVER["SERVER_PROTOCOL"]." 408 Request Time-out",
       409 => $_SERVER["SERVER_PROTOCOL"]." 409 Conflict",
       410 => $_SERVER["SERVER_PROTOCOL"]." 410 Gone",
       411 => $_SERVER["SERVER_PROTOCOL"]." 411 Length Required",
       412 => $_SERVER["SERVER_PROTOCOL"]." 412 Precondition Failed",
       413 => $_SERVER["SERVER_PROTOCOL"]." 413 Request Entity Too Large",
       414 => $_SERVER["SERVER_PROTOCOL"]." 414 Request-URI Too Large",
       415 => $_SERVER["SERVER_PROTOCOL"]." 415 Unsupported Media Type",
       416 => $_SERVER["SERVER_PROTOCOL"]." 416 Requested range not satisfiable",
       417 => $_SERVER["SERVER_PROTOCOL"]." 417 Expectation Failed",
       500 => $_SERVER["SERVER_PROTOCOL"]." 500 Internal Server Error",
       501 => $_SERVER["SERVER_PROTOCOL"]." 501 Not Implemented",
       502 => $_SERVER["SERVER_PROTOCOL"]." 502 Bad Gateway",
       503 => $_SERVER["SERVER_PROTOCOL"]." 503 Service Unavailable",
       504 => $_SERVER["SERVER_PROTOCOL"]." 504 Gateway Time-out"
   );
   header($http[$num]);
   header ("Location: $url");
}
?>
