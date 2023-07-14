<?php 
    define("PAGE_TITLE", "Install MinePaper");
    define("PAGE_DESC", "Find where to install MinePaper from. Supported operating systems include MacOS and Windows.");
?>
<html lang="en-US">
    <?php require "partial/head.php"; ?>
    <body id="bdyMainWindow" class="container">
        <?php require "partial/header.php"; ?>
        <div id="dvMainWindow" class="pixel-corners-radius-10-px-border-1px">
            <div id="downloadWelcome" class="visually-hidden">
                <h1>Install <?= $projectName ?></h1>
            </div>
            <div role="navigation"> 
                <?php require("partial/downloadTabs.php") ?> 
            </div>
        </div>
    <body>
</html>
