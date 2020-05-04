<?php


namespace App\Application\Factory;


use App\Domain\Entity\Gear;
use App\Domain\Entity\Workplace;

class GearFactory
{
    public function createGear(
        string $type,
        string $model,
        string $name,
        string $year,
        int $price,
        string $description,
        Workplace $workplace
    ): Gear
    {
        $gear = new Gear();
        $gear->setName($name)
            ->setType($type)
            ->setModel($model)
            ->setYear($year)
            ->setPrice($price)
            ->setDescription($description)
            ->setWorkplace($workplace);

        return $gear;
    }
}