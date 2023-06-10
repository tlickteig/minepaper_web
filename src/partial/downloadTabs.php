<?php 
    $tabInfo =array(
        array("windows" , "https://www.github.com/tlickteig/minepaper_uwp/releases/latest/download/minepaper.zip", "Windows", true),
        array("mac", "https://www.github.com/tlickteig/minepaper_mac/releases/latest/download/minepaper.zip", "MacOS", false)
    );
?>

<ul class="nav nav-tabs" id="releaseTypeTab" role="tablist">
<?php 
    foreach ($tabInfo as $osType):
        $osQuickName = $osType[0];
        $osFancyName = $osType[2];
        $downloadLink = $osType[1];
        $isActiveClass = $osType[3] ? "active" : ""; 
?>
    <li class="nav-item" role="presentation">
        <button role="tab" data-bs-toggle="tab" class='nav-link <?= $isActiveClass ?>' data-bs-target='#download-option-<?= $osQuickName ?>' id='<?=$osQuickName?>-download-tab' id='<?=$osQuickName?>-download-tab'>
            <?=$osFancyName?>
        </button>
    </li>
<?php endforeach; ?>
</ul>
<div class="tab-content">
<?php foreach ($tabInfo as $osType):
    $osQuickName = $osType[0];
    $osFancyName = $osType[2];
    $downloadLink = $osType[1];
    $isActiveClass = $osType[3] ? "show active" : ""; 
?>
    <div role='tabpanel' class='tab-pane fade <?= $isActiveClass ?>' id='download-option-<?= $osQuickName ?>' aria-labelledby='<?= $osQuickName ?>-download-tab'>
        <div class="d-grid gap-2 col-8 col-lg-6 mx-auto">
            <a class="btn btn-outline-dark btn-lg" role="button" id='<?= $osQuickName ?>-download-link' href='<?= $downloadLink ?>' >
                Download MinePaper for <?= $osFancyName ?>
            </a>
        </div>
    </div>
<?php endforeach; ?>
</div>