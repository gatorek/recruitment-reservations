<?php


namespace App\Infrastructure\Command;


class GearAssign
{
    /**
     * @var int
     */
    private $gearId;
    /**
     * @var int
     */
    private $workplaceId;

    /**
     * WorkplaceList constructor.
     */
    public function __construct(int $gearId, int $workplaceId)
    {
        $this->gearId = $gearId;
        $this->workplaceId = $workplaceId;
    }

    /**
     * @return int
     */
    public function getGearId(): int
    {
        return $this->gearId;
    }

    /**
     * @return int
     */
    public function getWorkplaceId(): int
    {
        return $this->workplaceId;
    }

}