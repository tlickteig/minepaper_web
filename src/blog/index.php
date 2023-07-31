<?php 
    $documentRoot = $_SERVER["DOCUMENT_ROOT"];
    require_once("$documentRoot/util/blogutils.php");
    
    $article_id = 0;
    if (isset($_GET["id"])) {
        $article_id = intval($_GET["id"]);
    }

    
?>

<?php require "$documentRoot/common/pageTop.php" ?>
<div class="py-2" id="dvWelcome">
    <h2>All Articles</h2>
</div>

<?php require "$documentRoot/common/pageBottom.php" ?>