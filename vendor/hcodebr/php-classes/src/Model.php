<?php

namespace Hcode;

class Model
{
    private $values = [];

    public function __call($name, $args)
    {
        $method = substr($name, 0, 3); //pega os 3 primeiros caracteres do metodo para saber se é get ou set
        $fieldName = substr($name, 3, strlen($name)); //pega do 4° pra frente para determinar o nome do método
        
        switch($method)
        {
            case "get":
                return $this->values[$fieldName];
            break;

            case "set":
                $this->values[$fieldName] = $args[0];
            break;
        }
    }

    public function setData($data = array())
    {
        foreach($data as $key => $value)
        {
            $this->{"set".$key}($value);
        }
    } 

    public function getValues()
    {
        return $this->values;
    }
}



?>