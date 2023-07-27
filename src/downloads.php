<?php
define("PAGE_TITLE", "Install MinePaper");
define("PAGE_DESC", "Find where to install MinePaper from. Supported operating systems include MacOS and Windows.");
?>
<?php require "common/pageTop.php" ?>
<div class="col-lg-10 mx-auto">
    <div id="dvWelcome" class="py-3">
        <h2>Install <?= Constants::$projectName ?></h2>
    </div>
    <div class="row">
        <?php require "partial/downloadTabs.php" ?>
    </div>
</div>
<?php require "common/pageBottom.php" ?>