<?php

namespace App\Application\Actions\Assunto;

use Psr\Http\Message\ResponseInterface as Response;

class ObterAssunto extends AssuntoAction
{
    protected function action(): Response
    {
        $params = $this->request->getQueryParams();

        return $this->respondWithData(
            $this->repository->find(
                $params['id_banca'],
                $params['id_orgao']
            )
        );
    }
}