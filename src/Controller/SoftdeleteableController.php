<?php

namespace App\Controller;

use App\Entity\Article;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SoftdeleteableController extends AbstractController
{
    #[Route('/softdeleteable')]
    public function index(EntityManagerInterface $em): Response
    {
        $article = $em->getRepository(Article::class)->find(1);
        $em->remove($article);
        $em->flush();
        
        return $this->render('softdeleteable/index.html.twig', [
            'controller_name' => 'SoftdeleteableController',
        ]);
    }
}
