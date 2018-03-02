<?php
class A{
    private static $obj = null;
    private function __construct(){

    }
    public static function getInstance(){
        if(empty(self::$obj)){
            self::$obj = new A();
        }
        return self::$obj;
    }

    public function operation(){
        echo "I'm A";
    }
}


$a = A::getInstance();
$a->operation();
