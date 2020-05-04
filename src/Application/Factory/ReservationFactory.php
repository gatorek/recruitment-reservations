<?php


namespace App\Application\Factory;


use App\Domain\Entity\Reservation;
use App\Domain\Entity\User;
use App\Domain\Entity\Workplace;

class ReservationFactory
{
    public function createReservation(
        User $user,
        Workplace $workplace,
        \DateTime $dateFrom,
        \DateTime $dateTo
    ): Reservation
    {
        if ($dateTo < $dateFrom) {
            throw new \DomainException('Start date before end date');
        }
        $reservation = new Reservation();
        $reservation->setUser($user)
            ->setWorkplace($workplace)
            ->setDateFrom($dateFrom)
            ->setDateTo($dateTo);

        return $reservation;
    }

}