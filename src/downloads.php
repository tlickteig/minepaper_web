<?php
$documentRoot = $_SERVER["DOCUMENT_ROOT"];
define("PAGE_TITLE", "Install MinePaper");
define("PAGE_DESC", "Find where to install MinePaper from. Supported operating systems include MacOS and Windows.");
?>
<?php require "$documentRoot/common/pageTop.php" ?>
<div class="col-lg-10 mx-auto">
    <div id="dvWelcome" class="py-3">
        <h2>Install <?= Constants::$projectName ?></h2>
    </div>
    <div class="row">
        <?php require "$documentRoot/partial/downloadTabs.php" ?>
    </div>
</div>
<?php require "$documentRoot/common/pageBottom.php" ?>