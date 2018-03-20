<?php
/**
 *装饰器模式:
 *解决的问题:
 *如果有一些具体的类他们互不关联,甚至互斥,但是有一些通用操作可以提供给他们
 */

abstract class ConfuseEnergy{
    abstract function work();
}

class Head extends ConfuseEnergy{
    public function work(){
        echo "head work!";
    } 
}

class Foot extends ConfuseEnergy{
    public function work(){
        echo "foot work!";
    }
}

class Decorator extends ConfuseEnergy{
    protected $confuseEnergy;
    public function __construct($confuseEnergy){
        $this->confuseEnergy = $confuseEnergy;
    }
    public function work(){
        $this->confuseEnergy->work();
    }
}

class LoveDecorator extends Decorator{
    public function __construct($confuseEnergy){
        parent::__construct($confuseEnergy);
    }

    public function work(){
        echo "love";
        $this->confuseEnergy->work();
    }
}
class ShitDecorator extends Decorator{
    public function __construct($confuseEnergy){
        parent::__construct($confuseEnergy);
    }

    public function work(){
        echo "shit";
        $this->confuseEnergy->work();
    }
}
$lovehead = new LoveDecorator(new Head());
$shithead = new ShitDecorator(new Head());
$lovehead->work();
$shithead->work();


