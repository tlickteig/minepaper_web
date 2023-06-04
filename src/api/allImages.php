<?php 
    require "../util/utilities.php";
    $user_ip_address = $_SERVER['REMOTE_ADDR'];
    $files = return_image_list_with_caching();
    $output = array("files" => $files);
    echo json_encode($output);
?>