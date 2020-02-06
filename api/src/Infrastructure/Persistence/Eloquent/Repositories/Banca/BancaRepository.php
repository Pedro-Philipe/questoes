<?php

namespace App\Infrastructure\Persistence\Eloquent\Repositories\Banca;


use App\Infrastructure\Persistence\Eloquent\Models\Banca;

class BancaRepository implements \App\Domain\Repositories\BancaRepository
{
    public function findAll(): array
    {
        return Banca::all()->toArray();
    }

}
