<?php
$documentRoot = $_SERVER["DOCUMENT_ROOT"];
require_once "$documentRoot/util/utilities.php";

// Get our active tabs
$tabInfo = Constants::get_tab_info();

// Check for a quickName matching the OS returned from the User Agent. Use default if not found
$activeOS = get_os_name("quickName") ?? Constants::$defaultTabName;
?>
<div class="d-flex justify-content-center" role="navigation">
    <ul class="nav nav-pills" id="releaseTypeTab" role="tablist">
        <?php
        foreach ($tabInfo as $osType) :
            $isActiveClass = $osType["quickName"] == $activeOS ? "active" : "";
        ?>
            <a type="button" role="tab" data-bs-toggle="tab" class='nav-link flex-fill <?= $isActiveClass ?>' data-bs-target='#download-option-<?= $osType["quickName"] ?>' id='<?= $osType["quickName"] ?>-download-tab' aria-controls="download-option-<?= $osType['quickName'] ?>">
                <?= $osType["fancyName"] ?>
            </a>
        <?php endforeach; ?>
    </ul>
</div>
<div class="tab-content">
    <?php
    foreach ($tabInfo as $osType) :
        $isActive = $osType["quickName"] == $activeOS;
        $isActiveClass = $isActive ? " active show" : "";
        $selected = $isActive ? "true" : "false";
    ?>
        <div role='tabpanel' class='tab-pane fade<?= $isActiveClass ?>' id='download-option-<?= $osType["quickName"] ?>' aria-labelledby='<?= $osType["quickName"] ?>-download-tab' aria-selected="<? $selected ?>">
            <div class="row pt-5">
                <div class="d-grid gap-2 col-8 col-lg-6 mx-auto">
                    <a class="btn btn-outline-dark btn-lg main-text" role="button" id='<?= $osType["quickName"] ?>-download-link' href='<?= $osType["releaseLink"] ?>' target="_blank" rel="noreferrer noopener">
                        Install <?= Constants::$projectName ?> for <?= $osType["fancyName"] ?>
                    </a>
                </div>
            </div>
            <div class="row pt-3">
                <div class="col-12 main-text">
                    <p>Find <?= Constants::$projectName ?> for <?= $osType["fancyName"] ?> on <a href='<?= $osType["githubLink"] ?>' target="_blank" rel="noreferrer noopener"> Github</a></p>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>