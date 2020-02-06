<?php
namespace App\Infrastructure\Persistence\Eloquent\Models;

use Illuminate\Database\Eloquent\Model as ModelEntity;

class ArvoreAssunto extends ModelEntity
{
    protected $table = 'rl_arvore_assunto';

    protected $primaryKey = 'id_arvore_assunto';

    public $timestamps = false;

    public function assuntoPai()
    {
        return $this->hasOne(
            Assunto::class,
            'id_assunto',
            'id_assunto_pai'
        );
    }

    public function assuntoFilho()
    {
        return $this->hasOne(
            Assunto::class,
            'id_assunto',
            'id_assunto_filho'
        );
    }

}
