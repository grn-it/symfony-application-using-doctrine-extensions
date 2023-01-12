<?php

namespace App\DataFixtures;

use App\Entity\CategoryTree;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryTreeFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $men = new CategoryTree();
        $men->setTitle('Men');
        
        $clothes = new CategoryTree();
        $clothes->setTitle('Clothes');
        $clothes->setParent($men);

        $jeans = new CategoryTree();
        $jeans->setTitle('Jeans');
        $jeans->setParent($clothes);

        $manager->persist($men);
        $manager->persist($clothes);
        $manager->persist($jeans);
        
        $manager->flush();
    }
}
