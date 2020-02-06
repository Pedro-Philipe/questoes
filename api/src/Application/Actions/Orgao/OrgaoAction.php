<?php

namespace App\Application\Actions\Orgao;

use App\Application\Actions\Action;
use App\Domain\Repositories\OrgaoRepository;
use Psr\Log\LoggerInterface;

abstract class OrgaoAction extends Action
{
    protected $repository;

    public function __construct(LoggerInterface $logger, OrgaoRepository $repository)
    {
        parent::__construct($logger);
        $this->repository = $repository;
    }
}
