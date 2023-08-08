<?php
$documentRoot = $_SERVER["DOCUMENT_ROOT"];
require_once("$documentRoot/util/constants.php");
$githubInfo = Constants::get_github_info();
?>
<header>
    <div id="dvHeader">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="/index.php"><?= Constants::$projectName ?>.net</a>
            <a class="sr-only sr-only-focusable visually-hidden" href="#dvMainWindow">Skip to main content</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#siteNav" aria-controls="siteNav" aria-expanded="false" aria-label="Toggle site navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="siteNav">
                <ul class="navbar-nav mr-auto">
                    <!-- <li class="nav-item active">
                            <a class="nav-link navbar-text" href="index.php">Home</a>
                        </li> -->
                    <li class="nav-item">
                        <a class="nav-link navbar-text" href="/downloads.php">Install</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link navbar-text" href="/gallery.php">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link navbar-text" href="/blog/index.php">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link navbar-text" href="/upload.php">Upload</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link navbar-text" href="/about.php">About</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle navbar-text" href="#" id="sourceOptions" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" aria-label="Toggle Github source navigation">Github</a>
                        <div class="dropdown-menu" aria-labelledby="sourceOptions">
                            <?php
                            foreach ($githubInfo as $osItem) :
                            ?>
                                <a class="dropdown-item" href="<?= $osItem["githubLink"] ?>" target="_blank" rel="noreferrer noopener"><?= $osItem["name"] ?></a>
                                <?php if ($osItem != $githubInfo[array_key_last($githubInfo)]) : ?>
                                    <div class='dropdown-divider'></div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>