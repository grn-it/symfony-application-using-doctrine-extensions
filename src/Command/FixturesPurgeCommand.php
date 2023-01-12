<?php

namespace App\Command;

use Doctrine\Common\DataFixtures\Purger\ORMPurgerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'app:fixtures:purge',
    description: 'Purge fixtures',
)]
class FixturesPurgeCommand extends Command
{
    public function __construct(
        private readonly ORMPurgerInterface $purger
    ) {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $io->title('Purge fixtures');

        if ($input->isInteractive()) {
            if (!$io->confirm(
                "Careful, database will be purged.\n Do you want to continue?",
                false
            )) {
                return Command::SUCCESS;
            }
        }

        $this->purger->purge();

        $io->success('Fixtures purged');

        return Command::SUCCESS;
    }
}
