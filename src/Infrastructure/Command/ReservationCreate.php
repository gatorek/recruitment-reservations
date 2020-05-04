<?php


namespace App\Infrastructure\Command;


use Cassandra\Date;

class ReservationCreate
{
    /**
     * @var int
     */
    private $userId;
    /**
     * @var int
     */
    private $workplaceId;
    /**
     * @var \DateTime
     */
    private $dateFrom;
    /**
     * @var \DateTime
     */
    private $dateTo;

    /**
     * WorkplaceList constructor.
     */
    public function __construct(
        int $userId,
        int $workplaceId,
        \DateTime $dateFrom,
        \DateTime $dateTo
    )
    {
        $this->userId = $userId;
        $this->workplaceId = $workplaceId;
        $this->dateFrom = $dateFrom;
        $this->dateTo = $dateTo;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @return int
     */
    public function getWorkplaceId(): int
    {
        return $this->workplaceId;
    }

    /**
     * @return \DateTime
     */
    public function getDateFrom(): \DateTime
    {
        return $this->dateFrom;
    }

    /**
     * @return \DateTime
     */
    public function getDateTo(): \DateTime
    {
        return $this->dateTo;
    }

}