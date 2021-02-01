<?php


namespace src\interfaces;

interface Loggers
{
    public function initLoggers($loggerName);
    public function setMsgParams($msgTime, $msgId, $msgType);
    public function logMessage($msgTime, $msgId, $msgType, $msgText);
}

abstract class LoggerClass implements Loggers {

    private $lname;

    public function initLoggers($loggerName)
    {
        $this->lname = $loggerName;
    }

    public function logMessage($msgTime, $msgId, $msgType, $msgText)
    {
        // private $dtformat = DateTime::ATOM;
        $createdDate = filectime(__FILE__);
        $msgTime = $createdDate;

        # Generating ID
        $msgId = rand(0, 255);

        # Set log types
        $msgType = ["Info", "Warn", "Error", "Critical"];

        # Set message
        $msgText = $msgType." || ID: ".$msgId." || Time logged: ".$msgTime." || Text logged: ".$msgText;

        # Echo message
        echo $msgText;
    }
}