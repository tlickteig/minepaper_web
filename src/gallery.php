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

    .active a {
        background-color: black !important;
    }

    .paginationjs-nav {
        font-family: Minecraft !important;
    }

    .paginationjs {
        text-align: center !important;
    }

    .gallery {
        margin-right: 0 auto !important;
        margin-left: 0 auto !important;
    }

    .paginationjs-pages {
        margin: 0 auto !important;
    }

    #dvImageGallery {
        overflow: auto;
        text-align: center !important;
    }
</style>

<script>
    function mainWindowTemplate(data) {
        var html = "";
        $.each(data, function(index, item) {
            html += '<div class="gallery">';
            html += '<a target="_blank" href="/wallpapers/' + item + '">';
            html += '<img src="/wallpapers/' + item + '" class="pixel-corners-radius-10-px px-0">';
            html += '</a></div>';
        });

        return html;
    }

    function doPagination() {
        if ($(document).width() > 582) {
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
        }
        else {
            $('#dvPagination').pagination({
                dataSource: imageList,
                pageSize: 5,
                showPageNumbers: false,
                showNavigator: true,
                callback: function(data, pagination) {
                    var html = mainWindowTemplate(data);
                    $("#dvImageGallery").html(html);
                }
            });
        }
    }

    var imageList = <?php echo $image_list_json; ?>;
    var imagesPerPage = 15;
    var imagePages = [];

    for (let i = 0; i < imageList.length; i += imagesPerPage) {
        const chunk = imageList.slice(i, i + imagesPerPage);
        imagePages.push(chunk);
    }

    $(document).ready(function() {
        doPagination();
    });

    $(window).on("resize", function() {
        doPagination();
    });

</script>

<div class="col-lg-10 mx-auto">
    <h2>Wallpaper Gallery</h2>
    <div id ="dvPagination">
    </div>
    <br />
    <div id="dvImageGallery">
    </div>
</div>

<?php require "common/pageBottom.php" ?>