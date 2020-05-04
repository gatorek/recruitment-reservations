<?php

namespace App\Infrastructure\Interfaces\ApiPort\Action;

use App\Infrastructure\Command\GearDelete;
use App\Infrastructure\Util\AbstractAction;

class GearDeleteAction extends AbstractAction
{
    public function __invoke(int $gearId)
    {
        $result = $this->ask(new GearDelete($gearId));

        return $this->json($result);
    }
}