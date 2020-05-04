<?php


namespace App\Infrastructure\Command;


class GearCreate
{
    /**
     * @var string
     */
    private $type;
    /**
     * @var string
     */
    private $model;
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $year;
    /**
     * @var int
     */
    private $price;
    /**
     * @var string
     */
    private $description;
    /**
     * @var int
     */
    private $workplaceId;

    public function __construct(
        string $type,
        string $model,
        string $name,
        string $year,
        int $price,
        string $description,
        int $workplaceId
    )
    {
        $this->type = $type;
        $this->model = $model;
        $this->name = $name;
        $this->year = $year;
        $this->price = $price;
        $this->description = $description;
        $this->workplaceId = $workplaceId;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getModel(): string
    {
        return $this->model;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getYear(): string
    {
        return $this->year;
    }

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return int
     */
    public function getWorkplaceId(): int
    {
        return $this->workplaceId;
    }

}