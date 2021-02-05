<?php

namespace App\Controller;

use App\Entity\User;
use App\Query\Doctrine\User\FindOneByUsername;
use Doctrine\ORM\NonUniqueResultException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * Class GetCurrentUserAction
 * @package App\Controller
 */
class GetCurrentUserAction extends AbstractController
{
    /**
     * @var FindOneByUsername
     */
    private FindOneByUsername $findUser;

    /**
     * GetCurrentUserAction constructor.
     * @param FindOneByUsername $findUser
     */
    public function __construct(FindOneByUsername $findUser)
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
