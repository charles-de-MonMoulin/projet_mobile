<?php

namespace App\Controller;

use App\Entity\User;
use App\Query\Doctrine\User\FindUserForSwipe;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\NonUniqueResultException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * Class FindUserToSwipeAction
 * @package App\Controller
 */
final class FindUserToSwipeAction extends AbstractController
{
    /**
     * @var FindUserForSwipe
     */
    private FindUserForSwipe $findUser;

    /**
     * FindUserToSwipeAction constructor.
     * @param FindUserForSwipe $findUser
     */
    public function __construct(
        FindUserForSwipe $findUser)
    {
        $this->findUser = $findUser;
    }

    /**
     * @return User
     * @throws NonUniqueResultException
     */
    public function __invoke(): User
    {
        return ($this->findUser)($this->getUser()->getUsername());
    }
}
