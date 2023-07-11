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
<html lang="en-US">
    <?php require "partial/head.php"; ?>
    <body id="bdyMainWindow" class="container">
        <?php require "partial/header.php"; ?>
        <div id="dvMainWindow" class="pixel-corners-radius-10-px-border-1px">
            <h2>Welcome to <?= Constants::$projectName ?>.net!</h2>
            <h5>Automatically rotate your desktop background between stunning Minecraft views.</h5>
            <table id="tbImageGallery" class="">
                <div class="d-table-row d-lg-table-cell">
                    <?php 
                        foreach($randomImages as $image): 
                    ?>
                    <div class="d-table-row d-lg-table-cell">
                        <img src="wallpapers/<?= $image; ?>" class="mb-3 mb-lg-0 container-fluid rounded pixel-corners-radius-10-px" />
                    </div>
                    <?php endforeach; ?>
                </div>
            </table>
            <h3 class="pt-2"><?= Constants::$projectName ?> is free and open source!</h3>
            <a href="downloads.php">
                <h4>Install <?= Constants::$projectName ?></h4>
            </a>
        </div>
    </body>
</html>
