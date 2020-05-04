<?php

namespace App\Infrastructure\Interfaces\ApiPort\Action;

use App\Infrastructure\Command\ReservationCreate;
use App\Infrastructure\Util\AbstractAction;
use Symfony\Component\HttpFoundation\Request;

class ReservationCreateAction extends AbstractAction
{
    public function __invoke(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        $result = $this->handle(new ReservationCreate(
            $data['userId'],
            $data['workplaceId'],
            new \DateTime($data['dateFrom']),
            new \DateTime($data['dateTo'])
        ));

        return $this->json($result);
    }
}