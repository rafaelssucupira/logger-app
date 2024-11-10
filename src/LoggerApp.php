<?php
namespace LoggerApp;
use Monolog\Logger;
use Monolog\Formatter\LineFormatter;
use Monolog\Handler\StreamHandler;

class LoggerApp 
{
    static function logger($filename, $channel = "console", $handler = "default") 
        {
            $logg = new Logger( $channel );

            $resultHandler = match($handler) {
                "log-file"    => new StreamHandler( getcwd() . "/logs/$filename.txt", Logger::DEBUG),
                default       => new StreamHandler( getcwd() . "/logs/$filename.txt", Logger::DEBUG)
            };

            $resultHandler->setFormatter( new LineFormatter(null, "d/m/Y H:i:s", false, true) );
            $logg->pushHandler( $resultHandler );
            
            return $logg;
        }

}


?>