<?php
namespace App\Wechats;

use App\Wechats\events\ClickEvent;
use App\Wechats\events\ScanEvent;
use App\Wechats\events\SubscribeEvent;
use App\Wechats\events\UnsubscribeEvent;

class Event
{
    protected $message;

    public function __construct($message)
    {
        $this->message = $message;
    }

    public function eventHandler()
    {
        switch ($this->message->Event) {
            case 'subscribe': // 关注
                return (new SubscribeEvent($this->message))->subscribeHandler();
            case 'unsubscribe': //取消关注
                return (new UnsubscribeEvent($this->message))->unsubscribeHandler();
            case 'SCAN': //已经关注
                return (new ScanEvent($this->message))->scanHandler();
            case 'CLICK': //自定义菜单
                return (new ClickEvent($this->message))->clickHandler();
            default:
                return null;
        }
    }

}
