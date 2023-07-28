<?php 
    require_once('constants.php');
    function return_image_list_with_caching() {

        $is_acpu_available = function_exists('apcu_enabled') && apcu_enabled();
        $files = array();
        $cache_ttl_hours = 3;

        if ($is_acpu_available) {
            if (apcu_exists(Constants::$fileListCacheKey)) {
                $files = apcu_fetch(Constants::$fileListCacheKey);
            }
        }

        if (count($files) == 0) {

            $raw_data = file_get_contents(Constants::$cdnUrl. "/allFiles.json");
            $json = json_decode($raw_data);
            $file_array = $json->{"files"};

            foreach ($file_array as $file) {

                if (str_contains($file, ".jpg")
                || str_contains($file, ".jpeg")
                || str_contains($file, ".png")
                || str_contains($file, ".JPG")
                || str_contains($file, ".PNG")
                || str_contains($file, ".JPEG")) {
                    array_push($files, $file);
                }
            }

            if ($is_acpu_available) {
                apcu_store(Constants::$fileListCacheKey, $files, 3600 * $cache_ttl_hours);
            }
        }

        return $files;
    }

    function return_number_of_images_in_directory($directory) {
        return sizeof(scandir($directory));
    }

    function is_apcu_enabled() {
        return function_exists('apcu_enabled') && apcu_enabled();
    }

    function get_user_agent() {
        return $_SERVER["HTTP_USER_AGENT"] ?? null;
    }

    function get_os_name($valueName = "quickName")
    {
        $user_agent = get_user_agent();
        if (preg_match(Constants::$windowsArr["regex"], $user_agent)) return Constants::$windowsArr[$valueName];
        if (preg_match(Constants::$macArr["regex"], $user_agent)) return Constants::$macArr[$valueName];
        // if (preg_match('(android)', $user_agent)) return 'Android';
        // if (preg_match('(iPhone|iPod|iPad)', $user_agent)) return 'MacLike';
        if (preg_match('(Win)', $user_agent)) return 'Windows';
        return null;
    }

    function is_page_https() {
        if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
            return true; 
        return false;
    }

    function get_site_host() {
        // Append the host(domain name, ip) to the URL.   
        $host = $_SERVER['HTTP_HOST'];
        return $host;
    }

    function get_requested_resource() {
        // Append the requested resource location to the URL   
        $request = $_SERVER['REQUEST_URI'];
        return $request;
    }

    function get_current_url() {
        $https = is_page_https() ? "https://" : "http://";
        $host = get_site_host();
        $request = get_requested_resource();  
        $url = $https . $host . $request;
        return $url;
    }

    function get_returned_resource() {
        $curPageName = substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1);
        return $curPageName;
    }

    function get_cannonical_url() {
        $url = "https://" . get_site_host();
        // Index.php is not canonical.
        if (get_returned_resource() == "index.php") {
            return $url;
        }
        return $url . "/" . get_returned_resource();
    }

    function return_client_ip_address() {
        return $_SERVER["REMOTE_ADDR"];
    }
?>