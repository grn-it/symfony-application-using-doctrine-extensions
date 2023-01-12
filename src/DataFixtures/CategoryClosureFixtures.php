<?php

namespace App\DataFixtures;

use App\Entity\CategoryClosure;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryClosureFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $men = new CategoryClosure();
        $men->setTitle('Men');

        $clothes = new CategoryClosure();
        $clothes->setTitle('Clothes');
        $clothes->setParent($men);

        $jeans = new CategoryClosure();
        $jeans->setTitle('Jeans');
        $jeans->setParent($clothes);

        $manager->persist($men);
        $manager->persist($clothes);
        $manager->persist($jeans);

        $manager->flush();
    }
}
