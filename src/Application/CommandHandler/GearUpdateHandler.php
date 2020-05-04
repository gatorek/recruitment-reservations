<?php


namespace App\Application\CommandHandler;


use App\Application\Util\AbstractHandler;
use App\Domain\Repository\GearRepository;
use App\Domain\Repository\WorkplaceRepository;
use App\Infrastructure\Command\GearUpdate;

class GearUpdateHandler extends AbstractHandler
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

    public function __invoke(GearUpdate $command)
    {
        $workplace = $this->workplaceRepository->getWorkplace($command->getWorkplaceId());
        $gear = $this->repository->getGear($command->getId());
        $gear->setName($command->getName())
            ->setType($command->getType())
            ->setModel($command->getModel())
            ->setYear($command->getYear())
            ->setPrice($command->getPrice())
            ->setDescription($command->getDescription())
            ->setWorkplace($workplace);

        return $this->repository->updateGear($gear);
    }
}