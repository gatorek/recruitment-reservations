<?php

namespace App\Infrastructure\Interfaces\ApiPort\Action;

use App\Infrastructure\Command\GearGet;
use App\Infrastructure\Util\AbstractAction;
use Symfony\Component\HttpFoundation\Request;

class GearGetAction extends AbstractAction
{
    public function __invoke(int $gearId)
    {
        $gear = $this->ask(new GearGet($gearId));

        return $this->json($gear);
    }
}