<?php

namespace App\Controller;

use App\Entity\Article;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlameableController extends AbstractController
{
    #[Route('/blameable')]
    public function index(EntityManagerInterface $em): Response
    {
        $article = new Article();
        $article->setTitle('Title');
        $article->setText('Text');
        $em->persist($article);
        $em->flush();
        
        return new Response('created', Response::HTTP_CREATED);
    }
}
