<?php


namespace App\Infrastructure\Command;


class UserGet
{
    /**
     * @var int
     */
    private $userId;

    /**
     * WorkplaceList constructor.
     */
    public function __construct(int $userId)
    {
        $this->userId = $userId;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

}