<?php
$documentRoot = $_SERVER["DOCUMENT_ROOT"];
define("PAGE_TITLE", "About MinePaper");
define("PAGE_DESC", "Learn more about MinePaper, including the terms of service and privacy policy.");
?>
<?php require "$documentRoot/common/pageTop.php" ?>
<div class="col-lg-10 mx-auto">
    <div class="" id="dvWelcome">
    </div>
    <div id="about">
        <h2>About <?= Constants::$projectName ?></h2>
        <div class="main-text">
            <?= Constants::$projectName ?> is dedicated to one thing, and one thing only: plastering your desktop with sweet ass Minecraft landscapes. It was the brain-child of two nerds who have way too much free time frankly, but it seems that the results are decent enough. Feel free to contribute to the project on Github, and dont forget to enjoy!
        </div>
    </div>
    <div class="py-4" id="tos">
        <h2>Terms of Service</h2>
        <div class="main-text">
            <?= Constants::$projectName ?>.net is completely free to use for any non-malicious and non-plaigaristic purpose.
        </div>
    </div>
    <div class="py-4" id="privacy">
        <h2>Privacy Policy</h2>
        <div class="main-text">
            <?= Constants::$projectName ?>.net does not collect or transmit any user-identifiable data such as email, name, address, or phone number.
        </div>
    </div>
</div>
<?php require "$documentRoot/common/pageBottom.php" ?>