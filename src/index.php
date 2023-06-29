<?php 
    define("PAGE_TITLE", "Welcome to Minepaper.net!");

    require "util/utilities.php";
    $files = return_image_list_with_caching();
    $numberOfCarouselItems = 3;

    // This code was generated with chatgpt lol
    $totalImages = count($files);
    $numberOfCarouselItems = min($numberOfCarouselItems, $totalImages);
    shuffle($files);
    $randomImages = array_slice($files, 0, $numberOfCarouselItems);
?>
<html>
    <?php require "partial/head.php"; ?>
    <body id="bdyMainWindow">
        <?php require "partial/header.php"; ?>
        <div id="dvMainWindow" class="pixel-corners-radius-10-px-border-1px">
            <h2>Welcome to <?= Constants::$projectName ?>.net!</h2>
            <h5>Automatically rotate your desktop background between stunning Minecraft views.</h5>
            <table id="tbImageGalleryHoriz">
                <tr>
                    <td>
                        <img src="wallpapers/<?= $randomImages[0]; ?>" class="rounded pixel-corners-radius-10-px" />
                    </td>
                    <td>
                        <img src="wallpapers/<?= $randomImages[1]; ?>" class="rounded pixel-corners-radius-10-px" />
                    </td>
                    <td>
                        <img src="wallpapers/<?= $randomImages[2]; ?>" class="rounded pixel-corners-radius-10-px" />
                    </td>
                </tr>
            </table>
            <table id="tbImageGalleryVert">
            <tr>
                <td>
                    <img src="wallpapers/<?= $randomImages[0]; ?>" class="rounded pixel-corners-radius-10-px" />
                </td>
            </tr>
            <tr>
                <td>
                    <img src="wallpapers/<?= $randomImages[1]; ?>" class="rounded pixel-corners-radius-10-px" />
                </td>
            </tr>
            <tr>
                <td>
                    <img src="wallpapers/<?= $randomImages[2]; ?>" class="rounded pixel-corners-radius-10-px" />
                </td>
            </tr>
            </table>
            <h3 class="pt-2"><?= Constants::$projectName ?> is free and open source!</h3>
            <a href="downloads.php">
                <h4>Install <?= Constants::$projectName ?></h4>
            </a>
        </div>
    </body>
</html>
