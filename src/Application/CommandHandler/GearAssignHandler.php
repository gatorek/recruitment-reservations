<?php


namespace App\Application\CommandHandler;


use App\Application\Util\AbstractHandler;
use App\Domain\Repository\GearRepository;
use App\Domain\Repository\WorkplaceRepository;
use App\Infrastructure\Command\GearAssign;

class GearAssignHandler extends AbstractHandler
{
    /**
     * @var GearRepository
     */
    private $repository;
    /**
     * @var WorkplaceRepository
     */
    private $workplaceRepository;

    public function __construct(GearRepository $repository, WorkplaceRepository $workplaceRepository)
    {
        $this->repository = $repository;
        $this->workplaceRepository = $workplaceRepository;
    }

    public function __invoke(GearAssign $command)
    {
        $gear = $this->repository->getGear($command->getGearId());
        $workplace = $this->workplaceRepository->getWorkplace($command->getWorkplaceId());
        $gear->setWorkplace($workplace);

        return $this->repository->updateGear($gear);
    }
}