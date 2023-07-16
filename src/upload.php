<?php
define("PAGE_TITLE", "Upload an image to Minepaper");
define("PAGE_DESC", "Upload your own image to add to the ever-growing gallery of Minecraft landscapes");

$output_message = "";
$target_dir = "../uploads/";

if (isset($_POST["submit"])) {

    $is_acpu_available = function_exists('apcu_enabled') && apcu_enabled();
    if (!$is_acpu_available) {
        $output_message = "File failed to upload (code 11)";
    }

    

    if (empty($output_message)) {
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777);
        }

        $uploadfile = $target_dir . basename($_FILES['uploadedFile']['name']);
        if (move_uploaded_file($_FILES['uploadedFile']['tmp_name'], $uploadfile)) {
            $output_message = "File upload successfully";
        } else {
            $output_message = "File failed to upload (code 15)";
        }
    }
}
?>

<?php require "common/pageTop.php" ?>
<h2>Upload an image to <?= Constants::$projectName ?>.net</h2>
<form action="upload.php" method="post" enctype="multipart/form-data">
    <input type="file" name="uploadedFile">
    <br />
    <p></p>
    <input type="submit" value="Upload Image" name="submit">
    <p><?= $output_message ?></p>
</form>
<?php require "common/pageBottom.php" ?>