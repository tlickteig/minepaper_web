<?php
define("PAGE_TITLE", "Install MinePaper");
define("PAGE_DESC", "Find where to install MinePaper from. Supported operating systems include MacOS and Windows.");
?>
<?php require "common/pageTop.php" ?>
<div id="dvWelcome" class="visually-hidden">
    <h1>Install <?= Constants::$projectName ?></h1>
</div>
<?php require "partial/downloadTabs.php" ?>
<?php require "common/pageBottom.php" ?>