<?php
require_once("util/utilities.php");
require_once("util/constants.php");
require_once("util/rateLimiting.php");

define("PAGE_TITLE", "Upload an image to Minepaper");
define("PAGE_DESC", "Upload your own image to add to the ever-growing gallery of Minecraft landscapes");

$output_message = "";
$target_dir = "../uploads/";

if (isset($_POST["submit"])) {

    $is_acpu_available = function_exists('apcu_enabled') && apcu_enabled();
    if (!$is_acpu_available) {
        $output_message = "File uploading is currently unavailable. Please try again later.";
    }

    if (empty($output_message)) {
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777);
        }
    }

    if (empty($output_message)) {
        RateLimiting::increase_rate_limiting_category(Constants::$fileUploadRateLimitingCacheKey, Constants::$fileUploadRateLimitTime);
        if (RateLimiting::has_rate_limiting_exceeded_threshold(Constants::$fileUploadRateLimitingCacheKey, Constants::$fileUploadRateLimitThreshold)) {
            $output_message = "You have uploaded too many files. Please try again later.";
        }
    }

    if (empty($output_message)) {
        $target_file = $target_dir . basename($_FILES["uploadedFile"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
            $output_message = "Only .png and .jpeg files are allowed";
        }
    }

    if ($_FILES["uploadedFile"]["size"] > Constants::$fileUploadMaxSizeBytes) {
        $output_message = "Your file is too large. Please try a different one.";
      }

    if (empty($output_message)) {
        $number_of_images_in_uploads = return_number_of_images_in_directory($target_dir);
        if ($number_of_images_in_uploads >= Constants::$fileUploadMaxImagesInUploadDirectory) {
            $output_message = "File uploading is currently not available. Please try again later.";
        }
    }

    if (empty($output_message)) {
        $uploadfile = $target_dir . basename($_FILES['uploadedFile']['name']);
        if (move_uploaded_file($_FILES['uploadedFile']['tmp_name'], $uploadfile)) {
            $output_message = "File uploaded successfully";
        } else {
            $output_message = "File failed to upload. Please try again.";
        }
    }
}
?>

<?php require "common/pageTop.php" ?>
<h2>Upload an image to <?= Constants::$projectName ?>.net</h2>
<form action="upload.php" method="post" enctype="multipart/form-data" class="pt-5">
    <input type="file" name="uploadedFile" class="pb-5">
    <br />
    <input type="submit" value="Upload Image" name="submit" class="py-1">
    <p class="py-2"><?= $output_message ?></p>
</form>
<?php require "common/pageBottom.php" ?>