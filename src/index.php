<?php 
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
        <div id="dvMainWindow">
            <h2>Welcome to MinePaper.net!</h2>

        </div>
    </body>
</html>
