# Abstração da classe monolog para logs em php.
Uso 👇🏻
```
<?php

require_once ('./vendor/autoload.php');

use LoggerApp\LoggerApp;
//LoggerApp ( PATH, CHANNEL, HANDLER )
$log            = LoggerApp::logger('log-file',     'log', 'handler_file')->info("This is a test message");
$logTelegram    = LoggerApp::logger('log-telegram', 'rentalapp', 'handler-telegram')->warning("This is a test message");

?>
```