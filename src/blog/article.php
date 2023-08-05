<?php
    $documentRoot = $_SERVER["DOCUMENT_ROOT"];
    require_once("$documentRoot/util/blogutils.php");

    $article_id = 0;
    if (isset($_GET["id"])) {
        $article_id = intval($_GET["id"]);
    }

    $path = $_SERVER['REQUEST_URI'];
    if ($article_id == 0 && ($path == "/blog/article/" || $path == "/blog/article.php")) {
        header('Location: /blog/index.php');
    }

    if ($article_id != 0) {
        $article = BlogUtils::fetch_article_by_id($article_id);
    }
    
    if (!isset($article)) {
        $article = BlogUtils::fetch_article_by_path($path);
    }

    if (!isset($article)) {
        header('Location: /blog/index.php');
    }

    define("CANONICAL_URL", $article->get_path());
    define("PAGE_DESC", $article->get_description());
    define("PAGE_TITLE", $article->get_title());
?>

<?php require "$documentRoot/common/pageTop.php" ?>
<div class="py-2" id="dvWelcome">
    <h2><?php echo $article->get_title(); ?></h2>
</div>

<div class="col-lg-10 mx-auto main-text">
    <p style="color: gray">
        By
        <?php echo $article->get_author(); ?>
        On
        <?php echo $article->get_date_added()->format("Y-m-d"); ?>
    </p>

    <?php echo $article->get_html(); ?>

    <?php
        $is_date_updated_set = $article->get_date_updated()->format("Y-m-d") != "1970-01-01";
        $is_date_updated_different = $article->get_date_updated()->format("Y-m-d") != $article->get_date_added()->format("Y-m-d"); 

        if ($is_date_updated_set && $is_date_updated_different) {
            $dateUpdated = $article->get_date_updated()->format("Y-m-d");
            echo "<p style=\"color: gray; text-align: left;\">Last updated on $dateUpdated</p>";
        }
    ?>

    <a style="text-align: left; float: left; color: blue;" href="#" onclick="history.back()">Back to previous page</back>
    <?php require "$documentRoot/common/pageBottom.php" ?>
</div>