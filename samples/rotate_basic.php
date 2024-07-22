<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include the autoloader
require_once('../../../../vendor/autoload.php');

// Use the iLovePDF RotateTask class
use Ilovepdf\RotateTask;

// Replace with your actual API keys
$myTask = new RotateTask('project_public_cb3201dd5503e6b30160a46588dfba0f_8YqSW2867b064e7a32ab04d7e436ccba792ef', 'secret_key_b88e424fb1b4ecc75d92895a92d0ddfc_Lz_3a894d2dee53f4733c34c62f1d68e61464');

// Add the file to the task
$filePath = 'C:\Users\AB\Downloads\ilovepdf_converted\your_file.pdf';
if (!file_exists($filePath)) {
    die('File not found: ' . $filePath);
}
$file = $myTask->addFile($filePath);

// Set the rotation
$file->setRotation(90);

// Execute the task
try {
    $myTask->execute();
} catch (Exception $e) {
    die('Error executing task: ' . $e->getMessage());
}

// Download the file
$downloadPath = 'C:\Users\AB\Downloads';
$myTask->download($downloadPath);
echo 'File downloaded successfully to: ' . $downloadPath;
