<?php
/**
 * Created by PhpStorm.
 * User: pedro
 * Date: 05/02/20
 * Time: 04:23
 */

namespace App\Infrastructure\Persistence\Eloquent\Repositories\Assunto;


use App\Infrastructure\Persistence\Eloquent\Models\Assunto;

class AssuntoRepository implements \App\Domain\Repositories\AssuntoRepository
{
    public function find(int $id_banca, int $id_orgao): array
    {
        $where = [
            'id_orgao' => $id_orgao,
            'id_banca' => $id_banca
        ];
        $assuntos = (new Assunto())
            ->assuntosRaiz()->with(
                'pai', 'filhos'
            )->get();

        $assuntos->map(function ($item) use ($where) {
            $item->quantidade_questoes = $item->quantidadeQuestoes($where);
            $item->filhos->map(function ($item) use ($where) {
                $item->quantidade_questoes = $item->quantidadeQuestoes($where);
            });
        });

        return $assuntos->toArray();
    }


}
