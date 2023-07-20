<?php
require_once("constants.php");
require_once("utilities.php");

class RateLimiting {
    public static function increase_rate_limiting_category($rateLimitingCategory, $seconds, $rateByIpAddress = true) {
        
        $rateLimitingCategory = "RATE_LIMITING_MINEPAPER_" . $rateLimitingCategory;
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

    public static function has_rate_limiting_exceeded_threshold($rateLimitingCategory, $threshold, $rateByIpAddress = true) {

        $output = false;
        $is_acpu_available = function_exists('apcu_enabled') && apcu_enabled();
        $rateLimitingCategory = "RATE_LIMITING_MINEPAPER_" . $rateLimitingCategory;

        if ($is_acpu_available) {
            if ($rateByIpAddress) {
                $rateLimitingCategory = $rateLimitingCategory . "_" . return_client_ip_address();
            }

            if (apcu_exists($rateLimitingCategory)) {
                $currentValue = apcu_fetch($rateLimitingCategory);
                if ($currentValue >= $threshold) {
                    $output = true;
                }
            }
        }

        return $output;
    }
}
?>