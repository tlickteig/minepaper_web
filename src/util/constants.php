<?php
class Constants {
    public static $fileListCacheKey = "FILE_LIST";

    public static $fileUploadRateLimitingCacheKey = "FILE_UPLOAD";
    public static $fileUploadRateLimitThreshold = 10;
    public static $fileUploadRateLimitTime = 3600;
    public static $fileUploadMaxImagesInUploadDirectory = 100;
    public static $fileUploadMaxSizeBytes = 5000000;

    public static $projectName = "MinePaper";
    // The default active download tab if user agent can not be found. Match with a "quickName"
    public static $defaultTabName = "windows";
    
    // Active tabs, in the order they will appear. 
    public static function get_tab_info() { 
        return array(
            Constants::$macArr,
            Constants::$windowsArr
        );
    }
    
    // Github items, in the order they will appear in the dropdown.
    public static function get_github_info() { 
        return array(
            Constants::$macArr,
            Constants::$windowsArr,
            Constants::$webArr
        );
    }

    // Defining details for the page. 
    // Name, Regex, QuickName, FancyName, and ReleaseLink necessary for item to appear in downloads. 
    // Name, QuickName, FancyName, GitHubLink necessary for item to appear in Github dropdown.
    public static $windowsArr = array(
        "name" => "Windows", 
        "regex" => "(Windows|Wince|Win)", 
        "quickName" => "windows", 
        "fancyName" => "Windows", 
        "releaseLink" => "https://www.microsoft.com/store/apps/9NRDK6D5FCKP", 
        "githubLink" => "ms-windows-store://pdp/?productid=9NRDK6D5FCKP"
    );

    public static $macArr = array(
        "name" => "Mac", 
        "regex" => "(Mac)", 
        "quickName" => "mac", 
        "fancyName" => "MacOS", 
        "releaseLink" => "https://apps.apple.com/us/app/minepaper/id6450654431", 
        "githubLink" => "https://www.github.com/tlickteig/minepaper_mac/releases/latest/"
    );

    public static $webArr = array(
        "name" => "Web", 
        "quickName" => "web", 
        "fancyName" => "Website", 
        "githubLink" => "https://www.github.com/tlickteig/minepaper_web/releases/latest/",
    );
}
?>