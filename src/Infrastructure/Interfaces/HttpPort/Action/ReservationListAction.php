<?php

namespace App\Infrastructure\Interfaces\HttpPort\Action;

use App\Infrastructure\Command\UserGet;
use App\Infrastructure\Command\UserList;
use App\Infrastructure\Command\WorkplaceList;
use App\Infrastructure\Util\AbstractAction;

class ReservationListAction extends AbstractAction
{
    public function __invoke()
    {
        $users = $this->ask(new UserList());
        $workplaces = $this->ask(new WorkplaceList());

        return $this->render('reservation/list.html.twig', compact('workplaces', 'users'));
    }
}