<?php 
    $documentRoot = $_SERVER["DOCUMENT_ROOT"];
    require_once("$documentRoot/util/blogutils.php");
?>

<?php require "$documentRoot/common/pageTop.php" ?>
<div class="py-2" id="dvWelcome">
    <h2>All Articles</h2>
</div>

<?php print_r(BlogUtils::fetch_article_list()) ?>

<?php require "$documentRoot/common/pageBottom.php" ?>
