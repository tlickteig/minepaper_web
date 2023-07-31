<?php 
    require_once("../util/blogutils.php");
    //echo $_SERVER['REQUEST_URI'];

    $dateAdded = new DateTIme();
    $dateAdded->setDate("2022", "06", "06");

    $dateUpdated = new DateTime();
    $dateUpdated->setDate("2022", "08", "08");

    //$article = new BlogArticle(345, "/blog/testfdsdf", "<h1>Hello World!</h1>", "Timothy Lickteig", "This is a test title", $dateAdded, $dateUpdated);
    
    //BlogUtils::save_article_to_cache($article);
    //$article2 = BlogUtils::load_article_from_cache_by_path("/blog/testfdsdf");
    //print_r($article2);
    //$article = BlogUtils::fetch_article_by_path("/blog/this-is-another-test-article");
    //print_r($article);
    $articles = BlogUtils::fetch_article_list();
    print_r($articles);
?>