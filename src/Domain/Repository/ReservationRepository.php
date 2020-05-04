<?php

namespace App\Domain\Repository;

use App\Domain\Entity\Reservation;

interface ReservationRepository
{
    public function getList(): array;

    public function createReservation(Reservation $reservation): ?Reservation;
}