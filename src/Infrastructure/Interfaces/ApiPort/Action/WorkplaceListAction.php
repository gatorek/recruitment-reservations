<?php

namespace App\Infrastructure\Interfaces\ApiPort\Action;

use App\Infrastructure\Command\WorkplaceList;
use App\Infrastructure\Util\AbstractAction;

class WorkplaceListAction extends AbstractAction
{
    public function __invoke()
    {
        $result = $this->ask(new WorkplaceList());

        return $this->json($result);
    }
}