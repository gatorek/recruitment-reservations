<?php

namespace App\Infrastructure\Interfaces\ApiPort\Action;

use App\Infrastructure\Command\GearCreate;
use App\Infrastructure\Util\AbstractAction;
use Symfony\Component\HttpFoundation\Request;

class GearCreateAction extends AbstractAction
{
    public function __invoke(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        $result = $this->handle(new GearCreate(
            $data['type'],
            $data['model'],
            $data['name'],
            $data['year'],
            $data['price'],
            $data['description'],
            (int) $data['workplaceId']
        ));

        return $this->json($result);
    }
}