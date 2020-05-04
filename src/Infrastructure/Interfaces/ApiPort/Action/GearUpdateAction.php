<?php

namespace App\Infrastructure\Interfaces\ApiPort\Action;

use App\Infrastructure\Command\GearUpdate;
use App\Infrastructure\Util\AbstractAction;
use Symfony\Component\HttpFoundation\Request;

class GearUpdateAction extends AbstractAction
{
    public function __invoke(Request $request)
    {
        $data = json_decode($request->getContent(), true);

        $result = $this->handle(new GearUpdate(
            $data['id'],
            $data['type'],
            $data['model'],
            $data['name'],
            $data['year'],
            $data['price'],
            $data['description'],
            $data['workplaceId']
        ));

        return $this->json($result);
    }
}