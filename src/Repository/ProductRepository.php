<?php

namespace App\Repository;

use App\Entity\Product;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Security\Core\Exception\UnsupportedProductException;
use Symfony\Component\Security\Core\Product\PasswordAuthenticatedProductInterface;
use Symfony\Component\Security\Core\Product\PasswordUpgraderInterface;

/**
 * @extends ServiceEntityRepository<Product>
 *
 * @method Product|null find($id, $lockMode = null, $lockVersion = null)
 * @method Product|null findOneBy(array $criteria, array $orderBy = null)
 * @method Product[]    findAll()
 * @method Product[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Product::class);
    }

    /**
     * @return [Product]
     */
    public function search(string $searchTerm): array
    {
        $query = $this->createQueryBuilder('p')
            ->where('p.label LIKE :term')
            ->orWhere('p.description LIKE :term')
            ->setParameter('term', '%' . $searchTerm . '%')
            ->getQuery()
        ;

        return $query->getResult();
    }
}
