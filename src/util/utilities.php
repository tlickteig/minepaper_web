<?php 
    function return_image_list_with_caching() {

        $is_acpu_available = function_exists('apcu_enabled') && apcu_enabled();
        $files = array();
        $cache_ttl_hours = 3;

        if ($is_acpu_available) {
            if (apcu_exists("FILE_LIST")) {
                $files = apcu_fetch("FILE_LIST");
            }
        }

        if (count($files) == 0) {

            $temp_files = glob($_SERVER['DOCUMENT_ROOT'] . "/wallpapers/*");
            foreach ($temp_files as $temp_file) {

                if (str_contains($temp_file, ".jpg")
                || str_contains($temp_file, ".jpeg")
                || str_contains($temp_file, ".png")
                || str_contains($temp_file, ".JPG")
                || str_contains($temp_file, ".PNG")
                || str_contains($temp_file, ".JPEG")) {
                    array_push($files, str_replace($_SERVER['DOCUMENT_ROOT'] . "/wallpapers/", "", $temp_file));
                }
            }

            if ($is_acpu_available) {
                apcu_store("FILE_LIST", $files, 3600 * $cache_ttl_hours);
            }
        }

        return $files;
    }

    function get_browser_name($user_agent)
{
    if (preg_match('(Windows|Wince)', $user_agent)) return 'Windows';
    elseif (preg_match('(Mac)', $user_agent)) return 'Mac';
    
    return 'Other';
    if (preg_match('(android)', $user_agent)) return 'Anroid';
    if (preg_match('(iPhone|iPod|iPad)', $user_agent)) return 'MacLike';
    if (preg_match('(Win)', $user_agent)) return 'Windows';
}
?>