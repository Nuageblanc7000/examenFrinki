<?php

namespace App\Repository;

use App\Data\DataFilter;
use App\Entity\Annonces;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Annonces>
 *
 * @method Annonces|null find($id, $lockMode = null, $lockVersion = null)
 * @method Annonces|null findOneBy(array $criteria, array $orderBy = null)
 * @method Annonces[]    findAll()
 * @method Annonces[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AnnoncesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Annonces::class);
    }

    public function add(Annonces $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Annonces $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }



    public function findByFilter(?DataFilter $search) : array
    {
        $query = $this
            ->createQueryBuilder('a')
            ->select('a','c')
            ->leftJoin('a.category','c')
            ;

            if(!empty($search->getSearch()))
            {
               $query = $query
                ->andWhere('a.title LIKE :search' )
                ->setParameter('search', "%{$search->getSearch()}%")
                ;
            }
            if(!empty($search->getCat()))
            {
                $query = $query
                ->andWhere('c.id IN (:category)' )
                ->setParameter('category', $search->getCat())
                ;
            }
            if(!empty($search->getState()))
            {
               $query = $query
                ->andWhere('a.state = :state' )
                ->setParameter('state', $search->getState())
                ;
            }
            
            return  $query->getQuery()->getResult();
             
    }
//    /**
//     * @return Annonces[] Returns an array of Annonces objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('a.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Annonces
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
