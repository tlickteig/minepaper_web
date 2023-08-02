<?php 
    $documentRoot = $_SERVER["DOCUMENT_ROOT"];
    require_once("$documentRoot/util/blogutils.php");

    $articles = BlogUtils::fetch_article_list();
?>

<?php require "$documentRoot/common/pageTop.php" ?>
<div class="py-2" id="dvWelcome">
    <h2>All Articles</h2>
</div>

<div class="col-lg-10 mx-auto main-text">
    <?php foreach($articles as $article) : ?>
        <?php //print_r($article); ?>
        <h4 style="text-align: center">
            <a href="<?php echo $article->get_path(); ?>">
                <?php echo $article->get_title(); ?>
            </a>
            - By <?php echo $article->get_author(); ?>
            <span style="color: gray">
                on <?php echo $article->get_date_added()->format("Y-m-d"); ?>
            </span>
        </h4>
        <p style="text-align: center; color: gray">
            <?php echo $article->get_description(); ?>
        </p>
        <?php if ($article->get_thumbnail_src() != "") : ?>
            <img class="col-md-6" src="<?php echo $article->get_thumbnail_src(); ?>" />
        <?php endif; ?>
        <p></p>
    <?php endforeach; ?>
</div>

<?php require "$documentRoot/common/pageBottom.php" ?>
