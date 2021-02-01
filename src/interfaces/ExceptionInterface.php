<?php


namespace src\interfaces;


use http\Exception;

interface ExceptionInterface extends Exception
{
    public function activate($interfaceName);
    public function getListOfActivatedInterfaces();
    public function createExceptionInstance($exId, $exMsg, $exType);
    //
    public function fromValue($vlaue);
}

abstract class implementInterface implements ExceptionInterface {
    private $name;
    //
    private $functionNames;
    //
    private $eId;
    private $eMsg;
    private $eType;
    //
    private $fValue;

    public function activate($interfaceName)
    {
        $this->name = $interfaceName;
    }

    public function getListOfActivatedInterfaces()
    {
        $this->functionNames = get_declared_interfaces();
        return $this->functionNames;
    }

    public function createExceptionInstance($exId, $exMsg, $exType)
    {
        $this->eId = rand(0,255);
        $this->eMsg = "";
        $this->eType = ["Info", "Warning", "Error", "Critical"];
        //
        $this->eId = $exId;
        $this->eMsg = $exMsg;
        $this->eType = $exType;
    }

    public function fromValue($value){
        $this->fValue = $value;
    }
}