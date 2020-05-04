<?php

namespace App\Infrastructure\Interfaces\ApiPort\Action;

use App\Infrastructure\Command\GearAssign;
use App\Infrastructure\Util\AbstractAction;

class GearAssignAction extends AbstractAction
{
    public function __invoke(int $gearId, int $workplaceId)
    {
        $result = $this->ask(new GearAssign($gearId, $workplaceId));

        return $this->json($result);
    }
}