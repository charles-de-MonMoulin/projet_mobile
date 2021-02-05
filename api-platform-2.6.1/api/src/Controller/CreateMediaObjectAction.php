<?php

namespace App\Controller;

use App\Entity\MediaObject;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

/**
 * Class CreateMediaObjectAction
 * @package App\Controller
*/
final class CreateMediaObjectAction
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
     * @param Request $request
     * @return MediaObject
     */
    public function invoke(Request $request): MediaObject
    {
        /** @var UploadedFile $uploadedFile */
        $uploadedFile = $request->files->get('file');
        if (!$uploadedFile) {
            throw new BadRequestHttpException('"file" is required');
        }

        $mediaObject = new MediaObject();
        $mediaObject->file = $uploadedFile;
        $mediaObject->filename = $uploadedFile->getClientOriginalName();

        $user = $request->get('user');
        if ($user) {
            /** @var User|null $currentUser */
            $currentUser = $this->entityManager->getRepository(User::class)->find($user);
            if ($currentUser) {
                $mediaObject->user = $user;
            }
        }

        return $mediaObject;
    }
}
