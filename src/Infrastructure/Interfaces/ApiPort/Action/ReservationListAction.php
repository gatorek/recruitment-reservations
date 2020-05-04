<?php

namespace App\Infrastructure\Interfaces\ApiPort\Action;

use App\Infrastructure\Command\ReservationList;
use App\Infrastructure\Util\AbstractAction;

class ReservationListAction extends AbstractAction
{
    public function __invoke()
    {
        $result = $this->ask(new ReservationList());

        return $this->json($result);
    }
}