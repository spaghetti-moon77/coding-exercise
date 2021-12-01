<?php

declare(strict_types=1);

namespace App\Command;

use App\Service\CheckerService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Output\OutputInterface;

abstract class AbstractCheckerCommand extends Command
{
    /** @var CheckerService $checkerService */
    protected $checkerService;

    /**
     * @param CheckerService $checkerService
     */
    public function __construct(CheckerService $checkerService)
    {
        parent::__construct();
        $this->checkerService = $checkerService;
    }

    /**
     * @param OutputInterface $output
     * @param boolean $result
     * @return void
     */
    protected function outputResult(
        OutputInterface $output,
        bool $result
    ) {
        $output->writeln('Checking complete and the result is...');

        if ($result === true) {
            $output->writeln('<fg=green>True!</>');
        } else {
            $output->writeln('<fg=red>False!</>');
        }
    }
}