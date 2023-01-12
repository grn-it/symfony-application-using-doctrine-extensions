<?php

namespace App\DataFixtures;

use App\Entity\CategoryMaterializedPath;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryMaterializedPathFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $men = new CategoryMaterializedPath();
        $men->setTitle('Men');

        $clothes = new CategoryMaterializedPath();
        $clothes->setTitle('Clothes');
        $clothes->setParent($men);

        $jeans = new CategoryMaterializedPath();
        $jeans->setTitle('Jeans');
        $jeans->setParent($clothes);

        $manager->persist($men);
        $manager->persist($clothes);
        $manager->persist($jeans);

        $manager->flush();
    }
}
