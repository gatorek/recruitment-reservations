<?php


namespace App\Application\CommandHandler;


use App\Application\Util\AbstractHandler;
use App\Domain\Repository\GearRepository;
use App\Infrastructure\Command\GearGet;

class GearGetHandler extends AbstractHandler
{
    /**
     * @var GearRepository
     */
    private $repository;

    public function __construct(GearRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(GearGet $command)
    {
        return $this->repository->getGear($command->getGearId());
    }
}