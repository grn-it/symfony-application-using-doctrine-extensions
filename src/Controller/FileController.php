<?php

namespace App\Controller;

use App\Entity\File;
use App\Service\Uploadable\FileInfo;
use Doctrine\ORM\EntityManagerInterface;
use Gedmo\Uploadable\UploadableListener;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FileController extends AbstractController
{
    #[Route('/file')]
    public function index(
        Request $request,
        UploadableListener $uploadableListener,
        EntityManagerInterface $em
    ): Response
    {
        /** @var UploadedFile $uploadedFile */
        foreach ($request->files as $uploadedFile) {
            $file = new File();
            $uploadableListener->addEntityFileInfo($file, new FileInfo([
                'error'     => 0,
                'size'      => $uploadedFile->getSize(),
                'type'      => $uploadedFile->getMimeType(),
                'tmp_name'  => $uploadedFile->getPathname(),
                'name'      => $uploadedFile->getFilename()
            ]));
            
            $em->persist($file);
        }

        $em->flush();

        /** 
         * remove uploaded files from tmp directory
         * move_uploaded_file() not working because $_FILES is empty, so used copy()
         * @see UploadableListener::doMoveFile
         */
        $filesystem = new Filesystem();
        /** @var UploadedFile $uploadedFile */
        foreach ($request->files as $uploadedFile) {
            $filesystem->remove($uploadedFile->getPathname());
        }
        
        return $this->render('file/index.html.twig', [
            'controller_name' => 'FileController',
        ]);
    }
}
