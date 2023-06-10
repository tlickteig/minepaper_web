<?php 
 require_once "util/utilities.php";
$agent = $_SERVER["HTTP_USER_AGENT"] ?? null;

$info = get_browser_name($agent);
echo "User appears to be on operating system: $info.";
?>