<?php


namespace App\Application\CommandHandler;


use App\Domain\Repository\WorkplaceRepository;
use App\Infrastructure\Command\WorkplaceList;
use App\Application\Util\AbstractHandler;

class WorkplaceListHandler extends AbstractHandler
{
    /**
     * @var WorkplaceRepository
     */
    private $repository;

    public function __construct(WorkplaceRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(WorkplaceList $_workplaceList)
    {
        return $this->repository->getList();
    }
}