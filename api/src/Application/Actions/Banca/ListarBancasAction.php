<?php
declare(strict_types=1);

namespace App\Application\Actions\Banca;

use Psr\Http\Message\ResponseInterface as Response;

class ListarBancasAction extends BancaAction
{
    protected function action(): Response
    {
        return $this->respondWithData(
            $this->repository->findAll()
        );
    }
}
