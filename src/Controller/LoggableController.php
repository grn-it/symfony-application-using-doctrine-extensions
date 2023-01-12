<?php

namespace App\Controller;

use App\Entity\Article;
use Doctrine\ORM\EntityManagerInterface;
use Gedmo\Loggable\Entity\LogEntry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/loggable/')]
class LoggableController extends AbstractController
{
    #[Route('edit')]
    public function edit(EntityManagerInterface $em): Response
    {
        $article = $em->getRepository(Article::class)->find(1);
        $article->setText('New text');

        $em->flush();

        return new Response('loggable edit');
    }

    #[Route('revert')]
    public function revert(EntityManagerInterface $em): Response
    {
        $em->getRepository(LogEntry::class)->revert(
            $em->getRepository(Article::class)->find(1)
        );

        $em->flush();

        return new Response('loggable revert');
    }
}
