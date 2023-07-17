<?php
require("constants.php");
require("utilities.php");

function increase_rate_limiting_category($rateLimitingCategory, $seconds, $rateByIpAddress = true) {
    
    $rateLimitingCategory = Constants::$rateLimitingCategory . "_" . $rateLimitingCategory
    $is_acpu_available = function_exists('apcu_enabled') && apcu_enabled();
    $success = true;

    if ($is_acpu_available){
        if ($rateByIpAddress) {
            $rateLimitingCategory = $rateLimitingCategory . "_" . return_client_ip_address();
        }

        if (apcu_exists($rateLimitingCategory)) {
            $currentValue = apcu_fetch($rateLimitingCategory);
            apcu_store($rateLimitingCategory, $currentValue + 1, $seconds);
        }
        else {
            apcu_store($rateLimitingCategory, 1, $seconds);
        }
    }
    else {
        $success = false;
    }

    return $success;
}

function has_rate_limiting_exceeded_threshold($rateLimitingCategory, $threshold, $rateByIpAddress = true) {

}
?>