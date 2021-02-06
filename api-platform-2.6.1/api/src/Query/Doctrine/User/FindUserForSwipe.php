<?php

namespace App\Query\Doctrine\User;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * Class FindUserForSwipe
 * @package App\Query\Doctrine\User
 */
class FindUserForSwipe extends ServiceEntityRepository
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
        $query = $this->createQueryBuilder("user")
            ->select("u.id")
            ->from(User::class, 'u')
            ->where('u.username != :username')
            ->orderBy('rand')
            ->setMaxResults(1)
            ->setParameter('username', $username);

        return $query->getQuery()->getOneOrNullResult();
    }
}
