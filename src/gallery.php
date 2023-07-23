<?php require "common/pageTop.php" ?>

<?php
    $image_list_json = json_encode(return_image_list_with_caching());
?>

<style>
    div.gallery {
        margin: 5px;
        float: left;
        width: 170px;
    }

    div.gallery img {
        width: 100%;
        height: auto;
    }

    div.desc {
        padding: 15px;
        text-align: center;
    }
    #dvImageGallery {
        overflow: auto;
    }
</style>

<script>
    var imageList = <?php echo $image_list_json; ?>;
    var imagesPerPage = 15;
    var imagePages = [];

    for (let i = 0; i < imageList.length; i += imagesPerPage) {
        const chunk = imageList.slice(i, i + imagesPerPage);
        imagePages.push(chunk);
    }

    var html = "";
    for (let i = 0; i < imagePages[0].length; i += 1) {
        var imageName = imagePages[0][i];

        html += '<div class="gallery">';
        html += '<a target="_blank" href="/wallpapers/' + imageName + '">';
        html += '<img src="/wallpapers/' + imageName + '>';
        html += '</a></div>';
    }
    $('#dvImageGallery').html(html);
    console.log(html);

</script>

<div class="col-lg-10 mx-auto">
    <h2>Wallpaper Gallery</h2>
    <div id="dvImageGallery" class="py-4" role="table">
        <!--<div class="gallery">
            <a target="_blank" href="/wallpapers/2023-06-19_20.28.40.png">
                <img src="/wallpapers/2023-06-19_20.28.40.png" class="pixel-corners-radius-10-px px-0" alt="Cinque Terre" width="600" height="400">
            </a>
        </div>
        
        <div class="gallery">
            <a target="_blank" href="/wallpapers/2023-06-19_20.28.40.png">
                <img src="/wallpapers/2023-06-19_20.28.40.png" alt="Forest" width="600" height="400">
            </a>
        </div>-->
    </div>
</div>

<?php require "common/pageBottom.php" ?>