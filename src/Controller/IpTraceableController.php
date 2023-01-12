<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IpTraceableController extends AbstractController
{
    #[Route('/ip-traceable')]
    public function index(EntityManagerInterface $em): Response
    {
        $article = new Article();
        $article->setTitle('Title');
        $article->setText('Text');
        $article->setCreatedBy($em->getRepository(User::class)->find(1));
        $article->setTranslatableLocale('en');
        $em->persist($article);

        $em->flush();
        
        return $this->render('ip_traceable/index.html.twig', [
            'controller_name' => 'IpTraceableController',
        ]);
    }
}
