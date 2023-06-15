<?php 
    require_once "util/utilities.php";
    $tabInfo = array(
        Constants::$windowsArr, 
        Constants::$macArr    
    );
    // Check for a quickName matching the OS returned from the User Agent
    $info = get_os_name("quickName");
    $tabToClick = "$info-download-tab";
?>

<ul class="nav nav-tabs" id="releaseTypeTab" role="tablist">
<?php 
    foreach ($tabInfo as $osType):
        if ($tabToClick != "") {
            $isActiveClass = $osType["quickName"] == $info ? "active" : "";
        } else {
            $isActiveClass = $osType["isDefaultTab"] ? "active" : ""; 
        }
?>
    <li class="nav-item" role="presentation">
        <button role="tab" data-bs-toggle="tab" class='nav-link <?= $isActiveClass ?>' data-bs-target='#download-option-<?= $osType["quickName"] ?>' id='<?= $osType["quickName"] ?>-download-tab'>
            <?= $osType["fancyName"] ?>
        </button>
    </li>
<?php endforeach; ?>
</ul>
<div class="tab-content">
<?php foreach ($tabInfo as $osType):
        if ($tabToClick != "") {
            $isActiveClass = $osType["quickName"] == $info ? "active show" : "";
        } else {
            $isActiveClass = $osType["isDefaultTab"] ? "active show" : ""; 
        }
?>
    <div role='tabpanel' class='tab-pane fade <?= $isActiveClass ?>' id='download-option-<?= $osType["quickName"] ?>' aria-labelledby='<?= $osType["quickName"] ?>-download-tab'>
        <div class="d-grid gap-2 col-8 col-lg-6 mx-auto">
            <a class="btn btn-outline-dark btn-lg" role="button" id='<?= $osType["quickName"] ?>-download-link' href='<?= $osType["link"] ?>' >
                Download MinePaper for <?= $osType["fancyName"] ?>
            </a>
        </div>
    </div>
<?php endforeach; ?>
</div>