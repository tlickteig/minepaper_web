<?php 
    require_once('util/constants.php');
?>
<header>
    <div id="dvHeader">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="index.php"><?= Constants::$projectName ?>.net</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#siteNav" aria-controls="siteNav" aria-expanded="false" aria-label="Toggle site navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="siteNav">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="downloads.php">Install</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="aboutUs.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tos.php">Terms of Service</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="privacyPolicy.php">Privacy Policy</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="sourceOptions" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" aria-label="Toggle Github source navigation">Github</a> 
                        <div class="dropdown-menu"  aria-labelledby="sourceOptions">
                            <a class="dropdown-item" href="https://github.com/tlickteig/minepaper_uwp/releases/latest" target="_blank" rel="noreferrer noopener">Windows</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="https://github.com/tlickteig/minepaper_mac/releases/latest" target="_blank" rel="noreferrer noopener">Mac</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="https://github.com/tlickteig/minepaper_web/releases/latest" target="_blank" rel="noreferrer noopener">Web</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>
