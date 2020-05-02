<?php

namespace App\Infrastructure\Util;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Messenger\Exception\LogicException;
use Symfony\Component\Messenger\HandleTrait;
use Symfony\Component\Messenger\MessageBusInterface;


abstract class AbstractAction extends AbstractController
{
    use HandleTrait {
        HandleTrait::handle as busHandle;
    }

    /**
     * @var MessageBusInterface
     */
    private $messageBus;


    public function __construct(MessageBusInterface $messageBus)
    {
        $this->messageBus = $messageBus;
    }

    /**
     * Handle submitted data.
     *
     * @param object $commandRequest
     * @return mixed
     */
    public function handle($commandRequest)
    {
        return $this->query($commandRequest);
    }

    /**
     * Query for asked data.
     *
     * @param object $commandRequest
     * @return mixed
     */
    public function ask($commandRequest)
    {
        return $this->query($commandRequest);
    }

    private function query($commandRequest)
    {
        try {
            return $this->busHandle($commandRequest);
        }
        catch (LogicException $e) {
            return null;
        }
    }

}