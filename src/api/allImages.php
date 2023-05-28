<?php 
    
    $user_ip_address = $_SERVER['REMOTE_ADDR'];
    $is_local_ip_address = false;
    $is_acpu_available = function_exists('apcu_enabled') && apcu_enabled();
    $files = array();
    $cache_ttl_hours = .1;

    if ($is_acpu_available) {
        if (apcu_exists("FILE_LIST")) {
            $files = apcu_fetch("FILE_LIST");
        }
    }

    if (count($files) == 0) {

        $temp_files = glob("../wallpapers/*");
        foreach ($temp_files as $temp_file) {

            if (str_contains($temp_file, ".jpg")
            || str_contains($temp_file, ".jpeg")
            || str_contains($temp_file, ".png")
            || str_contains($temp_file, ".JPG")
            || str_contains($temp_file, ".PNG")
            || str_contains($temp_file, ".JPG")) {
                array_push($files, str_replace("../wallpapers/", "", $temp_file));
            }
        }

        if ($is_acpu_available) {
            apcu_store("FILE_LIST", $files, 3600 * $cache_ttl_hours);
        }
    }

    $output = array("files" => $files);
    if ($user_ip_address == "::1" ||
        $user_ip_address == "localhost" ||
        $user_ip_address == "127.0.0.1" ||
        str_contains($user_ip_address, "192.168.")) {
        $output["ACPU_ENABLED"] = $is_acpu_available;
    }

    echo json_encode($output);
?>