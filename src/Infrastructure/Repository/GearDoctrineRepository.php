<?php

namespace App\Infrastructure\Repository;

use App\Domain\Entity\Gear;
use App\Domain\Repository\Gean;
use App\Domain\Repository\GearRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Gear|null find($id, $lockMode = null, $lockVersion = null)
 * @method Gear|null findOneBy(array $criteria, array $orderBy = null)
 * @method Gear[]    findAll()
 * @method Gear[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GearDoctrineRepository extends ServiceEntityRepository implements GearRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Gear::class);
    }

    // /**
    //  * @return Gear[] Returns an array of Gear objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Gear
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    public function createGear(Gear $gear): Gear
    {
        $this->_em->persist($gear);
        $this->_em->flush();

        return $gear;
    }

    public function updateGear(Gear $gear): Gear
    {
        $this->_em->persist($gear);
        $this->_em->flush();

        return $gear;
    }

    public function deleteGear(Gear $gear): void
    {
        $this->_em->remove($gear);
        $this->_em->flush();
    }

    public function getGear(int $gearId): ?Gear
    {
        return $this->find($gearId);
    }
}
