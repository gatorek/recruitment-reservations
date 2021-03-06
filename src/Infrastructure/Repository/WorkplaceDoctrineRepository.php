<?php

namespace App\Infrastructure\Repository;

use App\Domain\Entity\Workplace;
use App\Domain\Repository\WorkplaceRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Workplace|null find($id, $lockMode = null, $lockVersion = null)
 * @method Workplace|null findOneBy(array $criteria, array $orderBy = null)
 * @method Workplace[]    findAll()
 * @method Workplace[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WorkplaceDoctrineRepository extends ServiceEntityRepository implements WorkplaceRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Workplace::class);
    }

    // /**
    //  * @return Workplace[] Returns an array of Workplace objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('w.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Workplace
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    public function getList(): array
    {
        return $this->findAll();
    }

    public function getWorkplace(int $workplaceId): ?Workplace
    {
        return $this->findOneBy(['id' => $workplaceId]);
    }
}
