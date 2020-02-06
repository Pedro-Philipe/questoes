<?php

namespace App\Application\Actions\Assunto;

use App\Application\Actions\Action;
use App\Domain\Repositories\AssuntoRepository;
use Psr\Log\LoggerInterface;

abstract class AssuntoAction extends Action
{
    protected $repository;

    public function __construct(LoggerInterface $logger, AssuntoRepository $repository)
    {
        parent::__construct($logger);
        $this->repository = $repository;
    }
}
