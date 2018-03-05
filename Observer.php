<?php
interface Observer{
    public function update($work);
}

class Hand implements Observer{
    public function update($work){
        switch($work){
            case 'run':
                echo "跑啦,手臂甩起来!\n";
                break;
            case 'stop':
                echo "停下啦,赶紧缓缓!\n";
                break;
        }
    }
}

class Foot implements Observer{
    public function update($work){
        switch($work){
            case 'run':
                echo "跑啦,大腿跑起来!\n";
                break;
            case 'stop':
                echo "停下啦,累死个大腿!\n";
                break;
        }
    }
}

interface Subject {
    public function attach($observer);
    public function detach($class);

    public function notify($work);
}

class Head implements Subject{
    private $observerList = null;

    public function attach($observer){
        $this->observerList[] = $observer;
    }

    public function detach($class){
        foreach($this->observerList as $key=>$observer) {
            if(get_class($observer) == $class){
                unset($this->observerList[$key]);
            }
        }
    }

    public function notify($work){
        foreach($this->observerList as $observer){
            $observer->update($work);
        }
    }
}

$head = new Head();
$head->attach(new Hand());
$head->attach(new Foot());
$head->notify('run');
$head->notify('stop');
$head->detach("Hand");
$head->notify('run');
