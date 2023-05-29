<?php 
    require "../util/utilities.php";

    $user_ip_address = $_SERVER['REMOTE_ADDR'];
    $is_local_ip_address = false;
    $is_acpu_available = function_exists('apcu_enabled') && apcu_enabled();
    $files = return_image_list_with_caching();

    $output = array("files" => $files);
    if ($user_ip_address == "::1" ||
        $user_ip_address == "localhost" ||
        $user_ip_address == "127.0.0.1" ||
        str_contains($user_ip_address, "192.168.")) {
        $output["ACPU_ENABLED"] = $is_acpu_available;
    }

    echo json_encode($output);
?>