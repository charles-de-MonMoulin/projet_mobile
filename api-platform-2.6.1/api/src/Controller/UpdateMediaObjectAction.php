<?php

namespace App\Controller;

use App\Entity\MediaObject;
use App\Entity\User;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class UpdateMediaObjectAction
 * @package App\Controller
*/
final class UpdateMediaObjectAction
{
    private EntityManagerInterface $entityManager;

/**
* UpdateMediaObjectAction constructor.
* @param EntityManagerInterface $entityManager
*/
    public function construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @param string $id
     * @param Request $request
     * @return MediaObject
     * @throws Exception
     */
    public function invoke(string $id, Request $request): MediaObject
    {
        $uploadedFile = $request->files->get('file');
        /** @var MediaObject $mediaObject */
        $mediaObject = $this->entityManager->getRepository(MediaObject::class)->find($id);
        if ($uploadedFile) {
            $mediaObject->setFile($uploadedFile);
        }
        $mediaObject->setUpdatedAt(new DateTime());

        $user = $request->get('asset');
        if ($user) {
            /** @var User|null $currentUser */
            $currentUser = $this->entityManager->getRepository(User::class)->find($user);
            if ($currentUser) {
                $mediaObject->setUser($currentUser);
            }
        }

        return $mediaObject;
    }
}
