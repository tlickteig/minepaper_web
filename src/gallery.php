<?php
    $documentRoot = $_SERVER["DOCUMENT_ROOT"];
    require_once "$documentRoot/util/utilities.php";

    define("PAGE_TITLE", "Minepaper.net wallpaper gallery");
    define("PAGE_DESC", "View the beautiful Minecraft wallpapers that we have in store.");
    $image_list_json = json_encode(return_image_list_with_caching());
?>

<?php require "common/pageTop.php" ?>

<style>
    div.gallery img {
        width: 100%;
        height: auto;
    }

    .paginationjs-nav {
        font-family: Minecraft !important;
    }

    .paginationjs {
        text-align: center !important;
    }

    .paginationjs-pages {
        margin: 0 auto !important;
    }

    #dvImageGallery {
        overflow: auto;
        text-align: center !important;
    }

    #dvImageContainer {
        overflow: auto;
        margin: 0 auto !important;
    }

    .paginationjs .paginationjs-pages li>a {
        width:2rem;
        height:2rem !important;
        font-size: 1rem;
    }

    .paginationjs .paginationjs-pages li.disabled>a {
        color: black !important;
        opacity: 1;
    }
</style>

<script>
    function mainWindowTemplate(data) {
        var html = "<div id='dvImageContainer' class='row'>";
        $.each(data, function(index, item) {
            html += '<div class="gallery px-2 py-3 col-12 col-md-6 col-lg-4">';
            html += '<a target="_blank" href="<?php echo Constants::$cdnUrl ?>/' + item + '">';
            html += '<img src="<?php echo Constants::$cdnUrl ?>/' + item + '" class="pixel-corners-radius-10-px px-0">';
            html += '</a></div>';
        });
        html += "</div>";

        return html;
    }

    var imageList = <?php echo $image_list_json; ?>;
    var imagesPerPage = 15;
    var imagePages = [];

    for (let i = 0; i < imageList.length; i += imagesPerPage) {
        const chunk = imageList.slice(i, i + imagesPerPage);
        imagePages.push(chunk);
    }

    $(document).ready(function() {
        $('#dvPagination').pagination({
            dataSource: imageList,
            pageSize: 15,
            showPrevious: false,
            showNext: false,
            callback: function(data, pagination) {
                var html = mainWindowTemplate(data);
                $("#dvImageGallery").html(html);
            }
        });
    });
</script>

<div class="container">
    <h2>Wallpaper Gallery</h2>
    <div id ="dvPagination" class="py-4">
    </div>
    <br />
    <div id="dvImageGallery">
    </div>
</div>

<?php require "$documentRoot/common/pageBottom.php" ?>