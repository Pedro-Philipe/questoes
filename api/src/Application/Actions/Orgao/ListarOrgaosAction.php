<?php
declare(strict_types=1);

namespace App\Application\Actions\Orgao;
use App\Infrastructure\Persistence\Eloquent\Models\Banca;

use Psr\Http\Message\ResponseInterface as Response;

class ListarOrgaosAction extends OrgaoAction
{
    protected function action(): Response
    {
        return $this->respondWithData(
            $this->repository->findAll()
        );
    }
}
