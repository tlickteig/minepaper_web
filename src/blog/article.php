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
?>

<?php require "$documentRoot/common/pageTop.php" ?>
<div class="py-2" id="dvWelcome">
    <h2>Article</h2>
</div>

<?php echo print_r($article); ?>

<?php require "$documentRoot/common/pageBottom.php" ?>