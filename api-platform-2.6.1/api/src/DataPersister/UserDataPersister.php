<?php

namespace App\DataPersister;

use ApiPlatform\Core\DataPersister\DataPersisterInterface;
use App\Entity\User;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserDataPersister implements DataPersisterInterface
{
    /**
     * @var EntityManager|EntityManagerInterface
     */
    private EntityManager|EntityManagerInterface $entityManager;

    /**
     * @var UserPasswordEncoderInterface
     */
    private UserPasswordEncoderInterface $userPasswordEncoder;

    /**
     * UserDataPersister constructor.
     * @param EntityManagerInterface $entityManager
     * @param UserPasswordEncoderInterface $userPasswordEncoder
     */
    public function __construct(EntityManagerInterface $entityManager, UserPasswordEncoderInterface $userPasswordEncoder)
    {
        $this->entityManager = $entityManager;
        $this->userPasswordEncoder = $userPasswordEncoder;
    }

    /**
     * @param $data
     * @return bool
     */
    public function supports($data): bool
    {
        return $data instanceof User;
    }

    /**
     * @param $data
     * @return object|void
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function persist($data)
    {
        if ($data->getPlainPassword() !== null) {
            $data->setPassword(
                $this->userPasswordEncoder->encodePassword($data, $data->getPlainPassword())
            );
            $data->eraseCredentials();
        }
        dump("passé");

        $this->entityManager->persist($data);
        $this->entityManager->flush();
    }

    /**
     * @param $data
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove($data)
    {
        $this->entityManager->remove($data);
        $this->entityManager->flush();
    }
}
