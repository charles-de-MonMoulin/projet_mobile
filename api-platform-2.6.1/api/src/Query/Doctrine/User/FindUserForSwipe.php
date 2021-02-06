<?php

namespace App\Query\Doctrine\User;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
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
     */
    public function __invoke(string $username): User
    {
        $query = $this->createQueryBuilder("user")
            ->select("user")
            ->where('user.username != :username')
            ->setParameter('username', $username);

        $result = $query->getQuery()->getResult();
        shuffle($result);

        return $result[0];
    }
}
