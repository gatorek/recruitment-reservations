<?php


namespace App\Infrastructure\Command;


class GearDelete
{
    /**
     * @var int
     */
    private $gearId;

    /**
     * WorkplaceList constructor.
     */
    public function __construct(int $gearId)
    {
        $this->gearId = $gearId;
    }

    /**
     * @return int
     */
    public function getGearId(): int
    {
        return $this->gearId;
    }

}