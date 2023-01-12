<?php

namespace App\Controller;

use App\Entity\Article;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

class SluggableController extends AbstractController
{
    #[Route('/sluggable')]
    public function index(EntityManagerInterface $em): Response
    {
        $article = new Article();
        $article->setTitle('Article with slug');
        $article->setText('Text');
        $em->persist($article);

        $em->flush();
        
        return new Response('sluggable. Slug: ' . $article->getSlug());
    }

    #[Route('/sluggable/articles/{slug}')]
    public function item(string $slug, EntityManagerInterface $em): Response
    {
        $article = $em->getRepository(Article::class)->findOneBy(['slug' => $slug]);
        
        if (!$article) {
            throw new NotFoundHttpException('Article not found');
        }
        
        return new Response('Title: ' . $article->getTitle());
    }
}
