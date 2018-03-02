<?php
abstract class Body{
    abstract function work();
}

class BeautifulBody extends Body{
    public function work(){
        echo "我来组成漂亮躯干!\n";
    }
}

class UglyBody extends Body{
    public function work(){
        echo "我来组成丑陋躯干!\n";
    }
}

abstract class Head{
    abstract function show();
}

class BeautifulHead extends Head{
    public function show(){
        echo "我来组成漂亮头部!\n";
    }
}

class UglyHead extends Head{
    public function show(){
        echo "我来组成丑陋头部!\n";
    }
}

abstract class BabyZhuFactory{
    abstract function createBody();
    abstract function createHead();
}

class BeautifulBabyZhuFactory extends BabyZhuFactory{
    public function createBody(){
        return new BeautifulBody();
    }

    function createHead(){
        return new BeautifulHead();
    }
}

class UglyBabyZhuFactory extends BabyZhuFactory{
    public function createBody(){
        return new UglyBody();
    }

    function createHead(){
        return new UglyHead();
    }
}

class ZhuBaby{
    public function initBeautiful(){
        $factory = new BeautifulBabyZhuFactory();
        $this->head = $factory->createHead();
        $this->body = $factory->createBody();
        $this->body->work();
        $this->head->show();
    }

    public function initUgly(){
        $factory = new UglyBabyZhuFactory();
        $this->head = $factory->createHead();
        $this->body = $factory->createBody();
        $this->body->work();
        $this->head->show();
    }
}


$baby = new ZhuBaby();

$baby->initBeautiful();
$baby->initUgly();
