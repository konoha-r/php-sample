<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

abstract class Hss2Enum{

    private $scalar;

    public function __construct($value){
        $ref = new ReflectionObject($this);
        $consts = $ref->getConstants();
        if( !in_array($value, $consts, true) ){
            throw new InvalidArgumentException();
        }
        $this->scalar = $value;
    }

    final public static function __callStatic($label, $args){
        $class = get_called_class();
        $const = constant("$class::$label");
        return new $class($const);
    }

    final public function valueOf(){ return $this->scalar; }
    final public function __toString(){ return (string)$this->scalar; }

    final public function inValues($values){
        foreach($values as $value){
            if( $this->valueOf() === $value ){ return true; }
        }
        return false;
    }

}
