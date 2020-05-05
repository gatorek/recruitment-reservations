<?php

namespace App\Infrastructure\Interfaces\HttpPort\Action;

use App\Infrastructure\Util\AbstractAction;

class WorkplaceListAction extends AbstractAction
{
    public function __invoke()
    {
        return $this->render('workplace/list.html.twig');
    }
}