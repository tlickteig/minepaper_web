<html>
    <?php require "partial/head.php"; ?>
    <body id="bdyMainWindow">
        <?php require "partial/header.php"; ?>
        <div id="dvMainWindow" class="pixel-corners-radius-10-px-border-1px">
            <div id="downloadWelcome">

            </div>
            <ul class="nav nav-tabs" id="releaseTypeTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="windows-download-tab" role="tab" data-bs-target="#download-option-windows" data-bs-toggle="tab">Windows</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="mac-download-tab" role="tab" data-bs-target="#download-option-mac" data-bs-toggle="tab">MacOS</button>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="download-option-windows" role="tabpanel" aria-labelledby="windows-download-tab">
                        <a class="btn" id="windowsDownload" href="https://www.github.com/tlickteig/minepaper_uwp/releases/latest/download/minepaper.zip" role="button">For Windows</a>
                </div>
                <div class="tab-pane fade" id="download-option-mac" role="tabpanel" aria-labelledby="mac-download-tab">
                        <a class="btn" id="macDownload" href="https://www.github.com/tlickteig/minepaper_mac/releases/latest/download/minepaper.zip" role="button">For MacOS</a>
                </div>
            </div>
        </div>
    <body>
</html>
