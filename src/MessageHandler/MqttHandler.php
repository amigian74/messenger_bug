<?php


namespace App\MessageHandler;


use App\Message\Mqtt;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class MqttHandler implements MessageHandlerInterface
{
    public function __invoke(Mqtt $message)
    {
        echo $message->getCacheKey();
        exit();
    }
}