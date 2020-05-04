<?php

namespace App\Infrastructure\Interfaces\ApiPort\Action;

use App\Infrastructure\Command\UserGet;
use App\Infrastructure\Util\AbstractAction;

class UserGetAction extends AbstractAction
{
    public function __invoke(int $userId)
    {
        $result = $this->ask(new UserGet($userId));

        return $this->json($result);
    }
}