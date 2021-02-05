<?php

namespace App\Query\Doctrine\User;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * Class FindOneByUsername
 * @package App\Query\Doctrine\User
 */
class FindOneByUsername extends ServiceEntityRepository
{
    /**
     * FindUserForSwipe constructor.
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    /**
     * @param string $username
     * @return User
     * @throws NonUniqueResultException
     */
    public function __invoke(string $username): User
    {
        $query = $this->createQueryBuilder("user")->select("u")
            ->from(User::class, 'u')
            ->where('u.username = :name')
            ->setParameter('name', $username);

        return $query->getQuery()->getOneOrNullResult();
    }
}
