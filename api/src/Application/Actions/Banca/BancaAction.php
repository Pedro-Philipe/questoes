<?php

namespace App\Application\Actions\Banca;

use App\Application\Actions\Action;
use App\Domain\Repositories\BancaRepository;
use Psr\Log\LoggerInterface;

abstract class BancaAction extends Action
{
    protected $repository;

    public function __construct(LoggerInterface $logger, BancaRepository $repository)
    {
        parent::__construct($logger);
        $this->repository = $repository;
    }
}
