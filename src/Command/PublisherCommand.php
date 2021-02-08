<?php


namespace App\Command;


use App\Message\Mqtt;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Messenger\MessageBusInterface;

class PublisherCommand extends Command
{
    /** @var MessageBusInterface */
    private $messageBus;

    protected static $defaultName = "messenger:bug:publish";

    public function __construct(MessageBusInterface $bus, string $name = null)
    {
        parent::__construct($name);
        $this->messageBus = $bus;
    }

    protected function configure()
    {
        parent::configure();
        $this->addOption('message-count', null, InputOption::VALUE_REQUIRED, 'Message count')
            ->setDescription("Publishes given messages to mqtt redis stream");
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $messageCount = intval($input->getOption('message-count'));
        for ($messageIndex = 0; $messageIndex < $messageCount; $messageIndex++) {
            $messageToDispatch = new Mqtt(uniqid());
            $this->messageBus->dispatch($messageToDispatch);
        }
        return 0;
    }
}