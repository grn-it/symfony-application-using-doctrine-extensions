<?php

namespace App\Controller;

use App\Entity\Article;
use Doctrine\ORM\EntityManagerInterface;
use Gedmo\Translatable\TranslatableListener;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TranslatableController extends AbstractController
{
    #[Route('/translatable/{_locale}')]
    public function index(
        EntityManagerInterface $em,
        TranslatableListener $translatableListener
    ): Response
    {
        $translatableListener->setDefaultLocale('en');
        $translatableListener->setTranslationFallback(true);

        $articles = $em->getRepository(Article::class)->findWithOrder();
        
        return $this->render('translatable/index.html.twig', [
            'controller_name' => 'TranslatableController',
        ]);
    }
}
