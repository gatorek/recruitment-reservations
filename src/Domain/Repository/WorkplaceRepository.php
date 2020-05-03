<?php

namespace App\Domain\Repository;

use App\Domain\Entity\Workplace;

interface WorkplaceRepository
{
    public function getList(): array;

    public function getWorkplace(int $workplaceId): ?Workplace;
}