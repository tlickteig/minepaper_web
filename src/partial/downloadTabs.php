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

.nav-tabs .nav-link.active {
    background-color: var(--bs-gray-200);
}
</style>

<ul class="nav nav-tabs" id="releaseTypeTab" role="tablist">
<?php 
    foreach ($tabInfo as $osType):
        $isActiveClass = $osType["quickName"] == $activeOS ? "active" : "";
?>
    <li class="nav-item" role="presentation">
        <button role="tab" data-bs-toggle="tab" class='nav-link <?= $isActiveClass ?>' data-bs-target='#download-option-<?= $osType["quickName"] ?>' id='<?= $osType["quickName"] ?>-download-tab'>
            <?= $osType["fancyName"] ?>
        </button>
    </li>
<?php endforeach; ?>
</ul>
<div class="tab-content">
<?php 
    foreach ($tabInfo as $osType):
        $isActiveClass = $osType["quickName"] == $activeOS ? " active show" : "";
?>
    <div role='tabpanel' class='tab-pane fade<?= $isActiveClass ?>' id='download-option-<?= $osType["quickName"] ?>' aria-labelledby='<?= $osType["quickName"] ?>-download-tab'>
        <div class="row pt-5">    
            <div class="d-grid gap-2 col-8 col-lg-6 mx-auto">
                <a class="btn btn-outline-dark btn-lg" role="button" id='<?= $osType["quickName"] ?>-download-link' href='<?= $osType["releaseLink"] ?>' target="_blank" rel="noreferrer noopener" >
                    Install <?= Constants::$projectName ?> for <?= $osType["fancyName"] ?>
                </a>
            </div>
        </div>
        <div class="row pt-3">
            <div class="col-12">
                <p>Find <?= Constants::$projectName ?> for <?= $osType["fancyName"] ?> on <a href='<?= $osType["githubLink"] ?>'  target="_blank" rel="noreferrer noopener"> Github</a></p>
            </div>
        </div>
    </div>
<?php endforeach; ?>
</div>