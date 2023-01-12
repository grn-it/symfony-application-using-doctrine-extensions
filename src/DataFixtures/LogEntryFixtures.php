<?php

namespace App\DataFixtures;

use App\Entity\Article;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Gedmo\Loggable\Entity\LogEntry;
use Symfony\Component\Serializer\SerializerInterface;

class LogEntryFixtures extends Fixture implements DependentFixtureInterface
{
    public function __construct(
        private readonly SerializerInterface $serializer
    ) {}

    public function load(ObjectManager $manager): void
    {
        $logEntry = $manager->getRepository(LogEntry::class)->find(1);
        $logEntry->setUsername(
            $manager->getRepository(Article::class)->find(1)->getCreatedBy()->getUserIdentifier()
        );
        
        $manager->flush();
    }


    public function getDependencies(): array
    {
        return [
            ArticleFixtures::class
        ];
    }
}
