<?php

namespace Abc\Devel\Logger;

class Logger extends \Monolog\Logger
{

    public function dev($arg, $callSpot = '')
    {
        if (null === $arg) {
            $this->logDefault('(null) NULL', $callSpot);
        }

        $type = gettype($arg);
        switch ($type) {
            case 'boolean':
                $this->logBoolean($arg, $callSpot);
                break;
            case 'array':
                $this->logArray($arg, $callSpot);
                break;
            case 'object':
                $this->logObject($arg, $callSpot);
                break;
            default:
                $this->logDefault("($type) $arg", $callSpot);
                break;
        }
    }

    private function logBoolean($bool, $callSpot)
    {
        $message = $bool ? '(bool) TRUE' : '(bool) FALSE';
        $this->logDefault($message, $callSpot);
    }

    private function logArray($arr, $callSpot)
    {
        $this->logDefault('(array)', $callSpot, $arr);
    }

    private function logObject($obj, $callSpot)
    {
        $type = '(' . get_class($obj) . ')';

        if ($obj instanceof \Exception) {
            return $this->logDefault("($type)  {$obj->getMessage()}", $callSpot, $obj->getTrace());
        }

        if( method_exists($obj, 'getData') ){
            $data = ['data' => $obj->getData()];
        } else {
            $data = ['get_object_vars' => get_object_vars($obj)];
        }
        $this->logDefault($type, $callSpot, $data);
    }
    
    private function logDefault($message, $callSpot, $context = [])
    {
        $this->debug($callSpot . ' - ' . $message, $context);   
    }
}
