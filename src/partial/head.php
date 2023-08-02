<?php 
    if (!defined("PAGE_TITLE")) {
        define("PAGE_TITLE", "MinePaper.net");
    }

    if (!defined("PAGE_DESC")) {
        define("PAGE_DESC", "MinePaper.net");
    }

    $documentRoot = $_SERVER["DOCUMENT_ROOT"];
    require_once("$documentRoot/util/utilities.php");

    if (!defined("CANONICAL_URL")) {
        $canonicalUrl = get_cannonical_url();
    }
    else {
        $canonicalUrl = CANONICAL_URL;
    }

    $currentUrl = get_current_url();
?>

<head>
    <title><?= PAGE_TITLE ?></title>
    <meta name="description" content="<?= PAGE_DESC ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="/lib/jQuery/jquery-3.7.0.min.js"></script>
    <script src="/lib/jQuery/pagination-2.6.0.js"></script>
    <script src="/lib/bootstrap/js/bootstrap.bundle.js"></script>
    <link rel="stylesheet" href="/lib/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/standard.css" />
    <link rel="stylesheet" href="/css/pagination.css" />
    <link rel="icon" type="image/x-icon" href="/img/favicon.ico" />
    <?php 
    if ($canonicalUrl != $currentUrl):
    ?>
    <link rel="canonical" href="<?= $canonicalUrl ?>" />
    <?php 
    endif;
    ?>
</head>
