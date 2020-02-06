<?php

namespace App\Infrastructure\Persistence\Eloquent\Models;

use Illuminate\Database\Eloquent\Model as ModelEntity;


class Orgao extends ModelEntity
{
    protected $table = 'tb_orgao';

    protected $primaryKey = 'id_orgao';

    public $timestamps = false;

    protected $fillable = [
        'no_orgao',
        'sg_orgao',
    ];
}
