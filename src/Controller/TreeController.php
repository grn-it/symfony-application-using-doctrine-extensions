<?php

namespace App\Controller;

use App\Entity\CategoryClosure;
use App\Entity\CategoryMaterializedPath;
use App\Entity\CategoryTree;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TreeController extends AbstractController
{
    #[Route('/tree')]
    public function index(EntityManagerInterface $em): Response
    {
        $categoryRepository = $em->getRepository(CategoryTree::class);

        $categoryTree = $categoryRepository->children(
            $em->getRepository(CategoryTree::class)->find(1)
        );

        return $this->render('tree/index.html.twig', [
            'controller_name' => 'TreeController',
        ]);
    }

    #[Route('/tree/materialized-path')]
    public function materializedPath(EntityManagerInterface $em): Response
    {
        $categoryMaterializedPath =$em->getRepository(CategoryMaterializedPath::class)
            ->find(3)
            ->getPath()
        ;

        return $this->render('tree/index.html.twig', [
            'controller_name' => 'TreeController',
        ]);
    }

    #[Route('/tree/closure')]
    public function closure(EntityManagerInterface $em): Response
    {
        $categoryClosure = $em->getRepository(CategoryClosure::class)
            ->getChildren(includeNode: true)
        ;

        return $this->render('tree/index.html.twig', [
            'controller_name' => 'TreeController',
        ]);
    }
}
