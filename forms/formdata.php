<?php
require_once './../include/config.php';
// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  // The request method is not POST, so we do nothing
  exit('POST request method required');
}

if (!isset($_POST['iplans_submit'])) {
  http_response_code(401);
  exit;
}

// Get the file data
$files = $_FILES['userfiles'];
// Get the form data
$type = $_POST['type'];
$ref = $_POST['ref'];
$desti = $_POST['desti'];
$objet = $_POST['objet'];
$source = $_POST['source'];
$date = $_POST['date'];
$heure = $_POST['heure'];

$bytes = 1024 * 1024; //Convert Megabytes to bytes
$files = $_FILES["userfiles"];

if (empty($_FILES)) {
  exit('$_FILES is empty - is file_uploads set to "Off" in php.ini?');
}

if ($files["error"] !== UPLOAD_ERR_OK) {

  switch ($files["error"]) {
    case UPLOAD_ERR_PARTIAL:
      exit('File only partially uploaded');
      break;
    case UPLOAD_ERR_NO_FILE:
      exit('No file was uploaded');
      break;
    case UPLOAD_ERR_EXTENSION:
      exit('File upload stopped by a PHP extension');
      break;
    case UPLOAD_ERR_FORM_SIZE:
      exit('File exceeds MAX_FILE_SIZE in the HTML form');
      break;
    case UPLOAD_ERR_INI_SIZE:
      exit('File exceeds upload_max_filesize in php.ini');
      break;
    case UPLOAD_ERR_NO_TMP_DIR:
      exit('Temporary folder not found');
      break;
    case UPLOAD_ERR_CANT_WRITE:
      exit('Failed to write file');
      break;
    default:
      exit('Unknown upload error');
      break;
  }
}

// Reject uploaded file larger than 50MB
if ($files["size"] > MAX_UPLOAD_SIZE * $bytes) {
  exit('File too large (max ' . MAX_UPLOAD_SIZE . 'MB)');
}

$fileExt = explode(".", $files["name"]);
$fileActualExt = strtolower(end($fileExt));

$newfileName = uniqid("", true) . "." . $fileActualExt;
$dest = str_replace("forms", "uploads\\", __DIR__);

$fileDestination = $dest . $newfileName;
if (move_uploaded_file($files["tmp_name"], $fileDestination)) {
  header("Location: " . SITE_URL . "/courrier?sucess");
} else {
  header("Location: " . SITE_URL . "/courrier?failed");
}
