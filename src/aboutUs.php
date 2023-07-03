<?php
    define("PAGE_TITLE", "About MinePaper");
    define("PAGE_DESC", "Learn more about MinePaper and its creators.");
?>
<html>
    <?php require "partial/head.php"; ?>
    <body id="bdyMainWindow" class="container">
        <?php require "partial/header.php"; ?>
        <div id="dvMainWindow" class="pixel-corners-radius-10-px-border-1px">
            <div class="col-lg-8 mx-auto">
                <h2>About Us</h2>
                <?= Constants::$projectName ?> is dedicated to one thing, and one thing only: plastering your desktop with sweet ass Minecraft landscapes. It was the brain-child of two nerds who have way too much free time frankly, but it seems that the results are decent enough. Feel free to contribute to the project on Github, and dont forget to enjoy!
            </div>
        </div>
    <body>
</html>
