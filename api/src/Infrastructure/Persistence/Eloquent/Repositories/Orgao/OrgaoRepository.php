<?php

namespace App\Infrastructure\Persistence\Eloquent\Repositories\Orgao;


use App\Infrastructure\Persistence\Eloquent\Models\Orgao;

class OrgaoRepository implements \App\Domain\Repositories\OrgaoRepository
{

    public function findAll(): array
    {
        return Orgao::all()->toArray();
    }
}
