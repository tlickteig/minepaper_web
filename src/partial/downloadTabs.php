<?php 
    $tabInfo =array(
        array("windows" , "https://www.github.com/tlickteig/minepaper_uwp/releases/latest/download/minepaper.zip", "Windows", true),
        array("mac", "https://www.github.com/tlickteig/minepaper_mac/releases/latest/download/minepaper.zip", "MacOS", false)
    );
?>

<ul class="nav nav-tabs" id="releaseTypeTab" role="tablist">
<?php 
    foreach ($tabInfo as $osType):
        $isActive = $osType[3] ? "active" : ""; 
        $buttonClasses = "class='nav-link  $isActive'";
        $buttonTarget = "data-bs-target='#download-option-$osType[0]'";
        $buttonLabelledBy = "aria-labelledby='$osType[0]-download-tab'";
        $buttonId = "id='$osType[0]-download-tab'";
        $buttonLabelledBy = "aria-labelledby='download-option-$osType[0]'";
        $osFancyName = $osType[2];
?>
    <li class="nav-item" role="presentation">
        <button role="tab" data-bs-toggle="tab" <?php echo "$buttonClasses $buttonId $buttonTarget"; ?>><?php echo $osFancyName?></button>
    </li>
<?php endforeach; ?>
</ul>
<div class="tab-content">
<?php foreach ($tabInfo as $osType): 
    $isActive = $osType[3] ? "show active" : ""; 
    $tabClasses = "class='tab-pane fade $isActive'";
    $tabId = "id='download-option-$osType[0]'";
    $tabLabelledBy = "aria-labelledby='$osType[0]-download-tab'";
    $linkId = "id='$osType[0]-download-link'";
    $link = "href='$osType[1]'";
    $osFancyName = $osType[2];
?>
    <div role='tabpanel' <?php echo "$tabClasses $tabId $tabLabelledBy"; ?>>
        <div class="d-grid gap-2 col-8 col-lg-6 mx-auto">
            <a class="btn btn-outline-dark btn-lg" role="button" <?php echo "$linkId $link";?> >
                Download MinePaper for <?php echo $osFancyName; ?>
            </a>
        </div>
    </div>
<?php endforeach; ?>
</div>