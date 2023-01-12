<?php

namespace App\Controller;

use App\Entity\Article;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TimestampableController extends AbstractController
{
    #[Route('/timestampable')]
    public function index(EntityManagerInterface $em): Response
    {
        $createdAt = $em->getRepository(Article::class)->find(1)->getCreatedAt()->format('Y-m-d H:i:s');
        
        return new Response('Created At: ' . $createdAt);
    }
}
