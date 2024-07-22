<?php
//include the autoloader
require_once('../vendor/autoload.php');
//if manual installation has been used comment line that requires the autoload and uncomment this line:
//require_once('../init.php')

use Ilovepdf\HtmlpdfTask;
// its the verison 2

// you can call task class directly
// to get your key pair, please visit https://developer.ilovepdf.com/user/projects
$myTask = new HtmlpdfTask('project_public_cb3201dd5503e6b30160a46588dfba0f_8YqSW2867b064e7a32ab04d7e436ccba792ef','secret_key_b88e424fb1b4ecc75d92895a92d0ddfc_Lz_3a894d2dee53f4733c34c62f1d68e61464');

// file var keeps info about server file id, name...
// it can be used latter to cancel file
$file = $myTask->addUrl('https://ilovepdf.com');

// process files
$myTask->execute();

// and finally download file. If no path is set, it will be downloaded on current folder
$myTask->download();