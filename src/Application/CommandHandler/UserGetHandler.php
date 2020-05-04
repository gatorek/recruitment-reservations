<?php


namespace App\Application\CommandHandler;


use App\Application\Util\AbstractHandler;
use App\Domain\Repository\UserRepository;
use App\Infrastructure\Command\UserGet;

class UserGetHandler extends AbstractHandler
{
    /**
     * @var UserRepository
     */
    private $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(UserGet $command)
    {
        return $this->repository->getById($command->getUserId());
    }
}