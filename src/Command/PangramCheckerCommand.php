<?php

declare(strict_types=1);

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class PangramCheckerCommand extends AbstractCheckerCommand
{
    protected static $defaultName = 'app:checker:pangram';

    protected static $defaultDescription = 'Checks if a string is a pangram';

    public function configure(): void
    {
        $this
            ->setHelp(
                'This command checks if a string a pangram - a Pangram for'
                . ' a given alphabet is a sentence using every letter of the'
                . ' alphabet at least once.'
            )
            ->addArgument('string', InputArgument::REQUIRED, 'String to check');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return integer
     */
    public function execute(
        InputInterface $input,
        OutputInterface $output
    ): int {
        $string = $input->getArgument('string');

        $output->writeln(
            sprintf(
                'Checking if "%s" is a pangram...',
                $string,
            )
        );

        $result = $this->checkerService->isPangram($string);

        $this->outputResult($output, $result);

        return Command::SUCCESS;
    }
}
