<html>
    <?php require "partial/head.php"; ?>
    <body id="bdyMainWindow">
        <?php require "partial/header.php"; ?>
        <div id="dvMainWindow" class="pixel-corners-radius-10-px-border-1px">
            <div id="downloadWelcome">

            </div>
            <ul class="nav nav-tabs" id="releaseTypeTab" role="tablist">
                <li class="nav-item" role="presentation" id="windows-download-tab">
                    <a class="nav-link" href="#" role="tab" data-bs-target="#windows-download-tab" data-bs-toggle="tab">Windows</a>
                </li>
                <li class="nav-item" role="presentation" id="mac-download-tab">
                    <a class="nav-link" href="#" role="tab" data-bs-target="#mac-download-tab" data-bs-toggle="tab">MacOS</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" role="tabpanel" aria-labelledby="windows-download-tab">
                    <div class="btn">
                        <a id="windowsDownload" href="https://www.github.com/tlickteig/minepaper_uwp/releases/latest/download/minepaper.zip" role="button">For Windows</a>
                    </div>
                </div>
                <div class="tab-pane" role="tabpanel" aria-labelledby="mac-download-tab">
                    <div class="btn">
                        <a id="macDownload" href="https://www.github.com/tlickteig/minepaper_mac/releases/latest/download/minepaper.zip" role="button">For MacOS</a>
                    </div>
                </div>
            </div>
        </div>
    <body>
</html>
