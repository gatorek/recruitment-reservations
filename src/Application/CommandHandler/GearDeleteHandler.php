<?php


namespace App\Application\CommandHandler;


use App\Application\Util\AbstractHandler;
use App\Domain\Repository\GearRepository;
use App\Infrastructure\Command\GearDelete;

class GearDeleteHandler extends AbstractHandler
{
    /**
     * @var GearRepository
     */
    private $repository;

    public function __construct(GearRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(GearDelete $command)
    {
        $gear = $this->repository->getGear($command->getGearId());

        return $this->repository->deleteGear($gear);
    }
}