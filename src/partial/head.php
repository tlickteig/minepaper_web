<?php 
    if(!defined("PAGE_TITLE")) {
        define("PAGE_TITLE", "MinePaper.net");
    }

    if(!defined("PAGE_DESC")) {
        define("PAGE_DESC", "MinePaper.net");
    }

    require_once("util/utilities.php");
    $canonicalUrl = get_cannonical_url();
    $currentUrl = get_current_url();
?>

<head>
    <title><?= PAGE_TITLE ?></title>
    <meta name="description" content="<?= PAGE_DESC ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="./lib/jQuery/jquery-3.7.0.min.js"></script>
    <script src="./lib/bootstrap/js/bootstrap.bundle.js"></script>
    <link rel="stylesheet" href="./lib/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/standard.css" />
    <link rel="icon" type="image/x-icon" href="/img/favicon.ico" />
    <?php 
    if ($canonicalUrl != $currentUrl):
    ?>
    <link rel="canonical" href="<?= $canonicalUrl ?>" />
    <?php 
    endif;
    ?>
</head>
