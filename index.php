<?php

require_once ('./vendor/autoload.php');

use LoggerApp\LoggerApp;
$log = LoggerApp::logger('console', 'log-file')->info("This is a test message");


?>