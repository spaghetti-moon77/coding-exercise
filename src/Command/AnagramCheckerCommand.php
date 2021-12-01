<?php

declare(strict_types=1);

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class AnagramCheckerCommand extends AbstractCheckerCommand
{
    protected static $defaultName = 'app:checker:anagram';

    protected static $defaultDescription = 'Checks if a string is an anagram of another string';

    public function configure(): void
    {
        $this
            ->setHelp(
                'This command checks 2 strings to see if they are an anagram of each other'
            )
            ->addArgument('string', InputArgument::REQUIRED, 'String to check')
            ->addArgument('comparison-string', InputArgument::REQUIRED, 'String to compare against');
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
        $comparisonString = $input->getArgument('comparison-string');

        $output->writeln(
            sprintf(
                'Checking if "%s" is an anagram of "%s"...',
                $string,
                $comparisonString
            )
        );

        $result = $this->checkerService->isAnagram($string, $comparisonString);

        $this->outputResult($output, $result);

        return Command::SUCCESS;
    }
}