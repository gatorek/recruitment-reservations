<?php


namespace App\Application\CommandHandler;


use App\Application\Factory\GearFactory;
use App\Application\Util\AbstractHandler;
use App\Domain\Repository\GearRepository;
use App\Domain\Repository\WorkplaceRepository;
use App\Infrastructure\Command\GearCreate;

class GearCreateHandler extends AbstractHandler
{
    /**
     * @var GearRepository
     */
    private $repository;
    /**
     * @var GearFactory
     */
    private $factory;
    /**
     * @var WorkplaceRepository
     */
    private $workplaceRepository;

    public function __construct(GearRepository $repository, GearFactory $factory, WorkplaceRepository $workplaceRepository)
    {
        $this->repository = $repository;
        $this->factory = $factory;
        $this->workplaceRepository = $workplaceRepository;
    }

    public function __invoke(GearCreate $command)
    {
        $workplace = $this->workplaceRepository->getWorkplace($command->getWorkplaceId());
        $gear = $this->factory->createGear(
            $command->getType(),
            $command->getModel(),
            $command->getName(),
            $command->getYear(),
            $command->getPrice(),
            $command->getDescription(),
            $workplace
        );

        return $this->repository->createGear($gear);
    }
}