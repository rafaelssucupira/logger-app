<?php
namespace LoggerApp;
use Monolog\Logger;
use Monolog\Formatter\LineFormatter;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\TelegramBotHandler;

class LoggerApp 
{
    public $logger;

    public function __construct(
        protected $filename = "log",
        protected $channel  = "console",
        protected $handler  = "default",
        $teleParam = null
    ) 
    {  
        
        $log           = new Logger( $channel );
        $result  = match($handler) {
            default             => new StreamHandler( getcwd() . "/logs/$filename.txt", Logger::DEBUG),
            "handler-file"      => new StreamHandler( getcwd() . "/logs/$filename.txt", Logger::DEBUG),
            "handler-telegram"  => new TelegramBotHandler( $teleParam["apiKey"], $teleParam["channel"] , Logger::WARNING, true, "HTML" )
        };

        $result  ->setFormatter( new LineFormatter(null, "d/m/Y H:i:s", true, true) );
        $log     ->pushHandler( $result );

        $this->logger = $log;

    }


    public function push($method, $msg) 
        {

            $result  = match($method) {
                default   => $this->logger->info($msg),   
                "info"    => $this->logger->info($msg),
                "warning" => $this->logger->warning($msg)     
                
            };

        }

}


?>