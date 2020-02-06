<?php
namespace App\Infrastructure\Persistence\Eloquent\Models;

use Illuminate\Database\Eloquent\Model as ModelEntity;


class Banca extends ModelEntity
{
    protected $table = 'tb_banca';

    protected $primaryKey = 'id_banca';

    public $timestamps = false;

    protected $fillable = [
        'no_banca',
    ];
}
