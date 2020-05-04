<?php


namespace App\Application\CommandHandler;


use App\Application\Util\AbstractHandler;
use App\Domain\Repository\ReservationRepository;
use App\Infrastructure\Command\ReservationList;

class ReservationListHandler extends AbstractHandler
{
    /**
     * @var ReservationRepository
     */
    private $repository;

    public function __construct(ReservationRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(ReservationList $_command)
    {
        return $this->repository->getList();
    }
}