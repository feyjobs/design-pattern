<?php
/**
 *抽象工厂方法
 *优点:
 *1. 抽象工厂方法可以使用抽象接口创建一组相关的产品,例如本例中一个工厂支持创建 头部和躯干
 *2. 一个抽象工厂可以创建多个产品,头部,躯干等等
 *3. 通过替换抽象工厂可以完成对一组相关产品的替换,如通过UglyBabyZhuFactory替换BeautifulBabyZhuFactory可以将所有产品都替换成丑的
 *
 * 缺点:
 * 拓展性,抽象工厂方法的拓展性巨差,如果我们增加了一个产品,比方说手部,那么产品类需要添加新的产品,抽象工厂方法及其子类也都要进行相关编码创建新的产品抽象工厂方法
 *
 * 综上:所以我觉得,抽象工厂方法,可以用在几个产品相关性比较高的时候用,最典型的图形界面的风格,win一个工厂,osx一个工厂.
 */
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
