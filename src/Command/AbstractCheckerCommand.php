<?php

declare(strict_types=1);

namespace App\Command;

use App\Service\CheckerService;
use Symfony\Component\Console\Command\Command;

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
}