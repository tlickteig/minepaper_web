<?php
define("PAGE_TITLE", "Install MinePaper");
define("PAGE_DESC", "Find where to install MinePaper from. Supported operating systems include MacOS and Windows.");
?>
<?php require "common/pageTop.php" ?>
<div id="downloadWelcome" class="visually-hidden">
    <h1>Install <?= $projectName ?></h1>
</div>
<div role="navigation">
    <?php require("partial/downloadTabs.php") ?>
</div>
<?php require "common/pageBottom.php" ?>