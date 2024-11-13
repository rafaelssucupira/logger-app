# Abstração da classe monolog para logs em php.
Uso 👇🏻
```
<?php

require_once ('./vendor/autoload.php');

use LoggerApp\LoggerApp;

//LoggerApp ( FILENAME, CHANNEL, HANDLER )

$log = new LoggerApp( "log", "SQL.sqlCommand", "handler-file" );
$log->push( "info", "Teste!" );
$log = new LoggerApp( "log", "SQL.sqlCommand", "handler-telegram", array( "apiKey" => "xxxxxxxxxxx", "channel" => "xxxxxxxxxx" ) );
$log->push( "warning", "Teste!" );

?>
```