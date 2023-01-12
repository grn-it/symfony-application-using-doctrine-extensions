<?php

namespace App\Controller;

use App\Entity\Article;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SortableController extends AbstractController
{
    #[Route('/sortable')]
    public function index(EntityManagerInterface $em): Response
    {
        $articles = $em->getRepository(Article::class)->getBySortableGroups(
            ['sortableGroup' => 'Group #1']
        );

        dump($articles);
        
        return $this->render('sortable/index.html.twig', [
            'controller_name' => 'SortableController',
        ]);
    }
    
    #[Route('/sortable/resort')]
    public function resort(EntityManagerInterface $em): Response
    {
        $article = $em->getRepository(Article::class)->find(2);
        $article->setSortablePosition(0);
        $em->persist($article);
        $em->flush();
        
        return $this->render('sortable/index.html.twig', [
            'controller_name' => 'SortableController',
        ]);
    }
}
