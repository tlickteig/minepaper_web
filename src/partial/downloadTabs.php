<?php 
    $tabInfo =array(
        array("quickName" => "windows" , "link" => "https://www.github.com/tlickteig/minepaper_uwp/releases/latest/download/minepaper.zip", "fancyName" => "Windows", "isDefaultTab" => true),
        array("quickName" => "mac", "link" =>  "https://www.github.com/tlickteig/minepaper_mac/releases/latest/download/minepaper.zip",  "fancyName" => "MacOS",  "isDefaultTab" => false)
    );
?>

<ul class="nav nav-tabs" id="releaseTypeTab" role="tablist">
<?php 
    foreach ($tabInfo as $osType):
        $isActiveClass = $osType["isDefaultTab"] ? "active" : ""; 
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
        $isActiveClass = $osType["isDefaultTab"] ? "active show" : ""; 
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