<?php

require_once ('./vendor/autoload.php');

use LoggerApp\LoggerApp;
$log = LoggerApp::logger('log-file', 'console')->info("This is a test message");


?>