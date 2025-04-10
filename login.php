<?php

$post_from_json = file_get_contents("php://input");
$logfile = fopen("login.log", "w") or die("Logging error, please try again...");
$values_to_log = "1.1.1.1 - - [17/04/2012:04:20:69 +0000] \"POST /foo/245623412.html HTTP1.1\" 404"
//valores de nginx para generar logs por defecto: 
/*log_format combined '$remote_addr - $remote_user [$time_local] '
                      '"$request" $status $body_bytes_sent '
                      '"$http_referer" "$http_user_agent"';
*/
echo $post_from_json; //cause console.log($json) is for the weak

if($post_from_json == "foo"){
    header("HTTP/1.1 200 OK");
}
else{
    header("HTTP/1.1 401 Unauthorized");
    //header("Location: error_page.html");
}

fwrite($logfile, $values_to_log);
fclose($logfile);
//crear y unsetear sesión para replicar login valido

?>
