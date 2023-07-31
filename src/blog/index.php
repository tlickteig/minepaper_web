<?php 
    $documentRoot = $_SERVER["DOCUMENT_ROOT"];
    require_once("$documentRoot/util/blogutils.php");
    //echo $_SERVER['REQUEST_URI'];
    //$articles = BlogUtils::fetch_article_list();
    //print_r($articles);
?>

<?php require "$documentRoot/common/pageTop.php" ?>
<div class="py-2" id="dvWelcome">
    <h2>Articles</h2>
</div>

<?php require "$documentRoot/common/pageBottom.php" ?>