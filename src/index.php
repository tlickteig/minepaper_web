<?php
define("PAGE_TITLE", "Welcome to MinePaper.net!");
define("PAGE_DESC", "MinePaper is an application that automatically changes the desktop background between many stunning Minecraft screenshots.");

require "util/utilities.php";
$files = return_image_list_with_caching();
$numberOfCarouselItems = 3;

// This code was generated with chatgpt lol
$totalImages = count($files);
$numberOfCarouselItems = min($numberOfCarouselItems, $totalImages);
shuffle($files);
$randomImages = array_slice($files, 0, $numberOfCarouselItems);
?>

<?php require "common/pageTop.php" ?>
<div class="py-2" id="dvWelcome">
    <h2>Welcome to <?= Constants::$projectName ?>.net!</h2>
</div>

<div class="col-lg-10 mx-auto" style="font-size: 1.25rem;">
    Automatically rotate your desktop background between stunning Minecraft views.
</div>
<div id="tbImageGallery" class="py-4" role="table">
    <div class="d-table-row d-lg-table-cell">
        <?php
        foreach ($randomImages as $image) :
        ?>
            <div class="d-table-row d-lg-table-cell px-2">
                <img src="wallpapers/<?= $image; ?>" alt="Example Minecraft landscape option" class="mb-3 mb-lg-0 container-fluid rounded pixel-corners-radius-10-px px-0" />
            </div>
        <?php endforeach; ?>
    </div>
</div>
<h3 class="py-2"><?= Constants::$projectName ?> is free and open source!</h3>
<a href="downloads.php">
    <h4>Install <?= Constants::$projectName ?></h4>
</a>

<?php require "common/pageBottom.php" ?>