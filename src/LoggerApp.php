<?php
namespace LoggerApp;
use Monolog\Logger;
use Monolog\Formatter\LineFormatter;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\TelegramBotHandler;

class LoggerApp 
{
    static function logger($filename, $channel = "console", $handler = "default") 
        {
            $logg = new Logger( $channel );

            $resultHandler = match($handler) {
                "handler-file"          => new StreamHandler( getcwd() . "/logs/$filename.txt", Logger::DEBUG),
                "handler-telegram"      => new TelegramBotHandler( 
                    "7672712227:AAGKjr2VE7llysPhU6-vts-6CMULt_B144U",
                    "@logs_notifications"    
                , Logger::WARNING),
                default             => new StreamHandler( getcwd() . "/logs/$filename.txt", Logger::DEBUG)
            };

            $resultHandler->setFormatter( new LineFormatter(null, "d/m/Y H:i:s", false, true) );
            $logg->pushHandler( $resultHandler );
            
            return $logg;
        }

}


?>