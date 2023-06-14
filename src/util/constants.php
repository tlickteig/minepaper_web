<?php
class Constants {
    public static $siteName = "MinePaper.Net";
}

class NameMappings {
    public $name;
    public $regex;
    public $quickName;
    public $fancyName;

    function __construct($name, $regex, $quickName, $fancyName) {
        $this->name = $name;
        $this->regex= $regex;
        $this->quickName = $quickName;
        $this->fancyName = $fancyName;
    }
}
// New statements not supported in classes
$windows = new NameMappings("Windows", "(Windows|Wince|Win)", "windows", "Windows");
$mac = new NameMappings("Mac", "(Mac)", "mac", "MacOS");
?>