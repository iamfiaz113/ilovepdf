<?php
//include the autoloader
require_once('../../../../vendor/autoload.php');
//if manual installation has been used comment line that requires the autoload and uncomment this line:
//require_once('../init.php');

use Ilovepdf\Ilovepdf;


//this is a sample for a chined task. You can perform multiple tasks on a files uploading just once.

// you can call task class directly
// to get your key pair, please visit https://developer.iloveimg.com/user/projects
$ilovepdf = new Ilovepdf('project_public_cb3201dd5503e6b30160a46588dfba0f_8YqSW2867b064e7a32ab04d7e436ccba792ef','secret_key_b88e424fb1b4ecc75d92895a92d0ddfc_Lz_3a894d2dee53f4733c34c62f1d68e61464');

try {
    // Create and execute the split task
    $splitTask = $ilovepdf->newTask('split');
    $splitTask->addFile('C:\Users\AB\Downloads\ilovepdf_converted\your_file.pdf');
    $splitTask->setRanges("2");
    $splitTask->execute();

    // Create and execute the convert task
    $convertTask = $splitTask->next('pdfjpg');
    $convertTask->execute();

    // Download the converted file
    $convertTask->download('C:\Users\AB\Downloads');
} catch (Exception $e) {
    echo 'Error: ', $e->getMessage(), "\n";
}
