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
            <p>Lorem ipsum dolor sit amet, consectetur 
                adipiscing elit. Sed sodales faucibus 
                pretium. Nunc nec blandit erat. Sed a 
                dolor luctus, laoreet justo at, auctor 
                massa. In malesuada lorem vitae odio 
                sollicitudin egestas. Aliquam sed ligula 
                at orci aliquam lobortis. In sit amet odio 
                eros. In quis ultrices neque, et elementum nulla.</p>
            <table id="tbImageGallery">
                <tr>
                    <td>
                        <img src="wallpapers/<?php echo $randomImages[0]; ?>" class="rounded" />
                    </td>
                    <td>
                        <img src="wallpapers/<?php echo $randomImages[1]; ?>" class="rounded" />
                    </td>
                    <td>
                        <img src="wallpapers/<?php echo $randomImages[2]; ?>" class="rounded" />
                    </td>
                </tr>
            </table>
            <p></p>
            <a href="#">
                <h2>Download now</h2>
            </a>
        </div>
    </body>
</html>
