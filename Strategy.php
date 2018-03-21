<?php
/**
 * 策略模式
 */
abstract class Strategy{
    abstract function work();
}

class GoodStrategy extends Strategy{
    public function work(){
        echo "good!\n";
    }
}

class BadStrategy extends Strategy{
    public function work(){
        echo "bad!\n";
    }
}

class Client {
    private $stratogy;
    public function __construct(Strategy $strategy){
        $this->strategy = $strategy;
    }

    public function setStrategy(Strategy $strategy){
        $this->strategy = $strategy;
    }
    public function makeMoney(){
        $this->strategy->work();
    }
}

$goodStrategy = new GoodStrategy();
$client = new Client($goodStrategy);
$client->makeMoney();
$badStrategy = new BadStrategy();
$client->setStrategy($badStrategy);
$client->makeMoney();

