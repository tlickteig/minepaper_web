<?php
require_once "util/utilities.php";

// Get our active tabs
$tabInfo = Constants::get_tab_info();

// Check for a quickName matching the OS returned from the User Agent. Use default if not found
$activeOS = get_os_name("quickName") ?? Constants::$defaultTabName;
?>
<style>
    .nav-link {
        --bs-nav-link-color: var(--bs-black);
        border: var(--bs-nav-tabs-border-width) solid !important;
        border-bottom: none;
    }

    .nav-pills .nav-link {
        background-color: #196d17;
        color: lightgrey;
    }
    .nav-pills .navlink:hover {
        color: #fff;
    }

    .nav-pills .nav-link.active {
        background-color: #252525;
        color: #a0e080;
    }

    .nav-pills .nav-link:hover:not(.active) {
        color: whitesmoke;
    }
</style>

<div class="col-lg-3 d-flex align-items-center" role="navigation">
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
<div class="tab-content col-lg-9">
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