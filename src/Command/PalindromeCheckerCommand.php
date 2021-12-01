<?php

declare(strict_types=1);

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class PalindromeCheckerCommand extends AbstractCheckerCommand
{
    protected static $defaultName = 'app:checker:palindrome';

    protected static $defaultDescription = 'Checks if a string is a palindrome';

    public function configure(): void
    {
        $this
            ->setHelp(
                'This command checks if a word, phrase, number, or other sequence of '
                . 'characters which reads the same backward or forward.'
            )
            ->addArgument('string', InputArgument::REQUIRED, 'String to check');
    }

    public function execute(
        InputInterface $input,
        OutputInterface $output
    ): int {
        $string = $input->getArgument('string');
        $output->writeln(sprintf('Checking if "%s" is a palindrome...', $string));

        $result = $this->checkerService->isPalindrome($string);

        $output->writeln('Checking complete and the result is...');

        if ($result === true) {
            $output->writeln(sprintf('True! "%s" is a palindrome', $string));
        } else {
            $output->writeln(sprintf('False! "%s" is not a palindrome', $string));
        }

        return Command::SUCCESS;
    }
}