<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ArticleFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $article = new Article();
        $article->setTitle('Title');
        $article->setText('Text');
        $article->setCreatedBy($manager->getRepository(User::class)->find(1));
        $article->setTranslatableLocale('en');
        $article->setCreatedFromIp('127.0.0.1');
        $article->setUpdatedFromIp('127.0.0.1');
        $article->setSortablePosition(0);
        $article->setSortableGroup('Group #1');
        $manager->persist($article);

        $manager->flush();
        
        $article->setTranslatableLocale('ru');
        $article->setTitle('Title in ru');
        $article->setText('Text in ru');
        $article->setCreatedBy($manager->getRepository(User::class)->find(1));

        $manager->flush();

        $article = new Article();
        $article->setTitle('Title #2');
        $article->setText('Text #2');
        $article->setCreatedBy($manager->getRepository(User::class)->find(1));
        $article->setTranslatableLocale('en');
        $article->setCreatedFromIp('127.0.0.1');
        $article->setUpdatedFromIp('127.0.0.1');
        $article->setSortablePosition(1);
        $article->setSortableGroup('Group #1');
        $manager->persist($article);

        $manager->flush();
    }


    public function getDependencies(): array
    {
        return [
            UserFixtures::class
        ];
    }
}
