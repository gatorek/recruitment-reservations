<?php

namespace App\Domain\Repository;

use App\Domain\Entity\Gear;

interface GearRepository
{
    public function createGear(Gear $gean): Gear;

    public function updateGear(Gear $gear): Gear;

    public function deleteGear(Gear $gear): void;

    public function getGear(int $gearId): ?Gear;
}