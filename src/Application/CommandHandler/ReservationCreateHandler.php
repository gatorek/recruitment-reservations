<?php


namespace App\Application\CommandHandler;


use App\Application\Factory\ReservationFactory;
use App\Application\Util\AbstractHandler;
use App\Domain\Repository\ReservationRepository;
use App\Domain\Repository\UserRepository;
use App\Domain\Repository\WorkplaceRepository;
use App\Infrastructure\Command\ReservationCreate;

class ReservationCreateHandler extends AbstractHandler
{
    /**
     * @var ReservationRepository
     */
    private $repository;
    /**
     * @var ReservationFactory
     */
    private $factory;
    /**
     * @var UserRepository
     */
    private $userRepository;
    /**
     * @var WorkplaceRepository
     */
    private $workplaceRepository;

    public function __construct(ReservationRepository $repository,
                                ReservationFactory $factory,
                                UserRepository $userRepository,
                                WorkplaceRepository $workplaceRepository)
    {
        $this->repository = $repository;
        $this->factory = $factory;
        $this->userRepository = $userRepository;
        $this->workplaceRepository = $workplaceRepository;
    }

    public function __invoke(ReservationCreate $command)
    {
        $user = $this->userRepository->getById($command->getUserId());
        $workplace = $this->workplaceRepository->getWorkplace($command->getWorkplaceId());
        $reservation = $this->factory->createReservation(
            $user,
            $workplace,
            $command->getDateFrom(),
            $command->getDateTo()
        );

        return $this->repository->createReservation($reservation);
    }
}