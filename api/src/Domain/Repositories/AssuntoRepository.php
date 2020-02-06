<?php
/**
 * Created by PhpStorm.
 * User: pedro
 * Date: 05/02/20
 * Time: 02:47
 */

namespace App\Domain\Repositories;


interface AssuntoRepository
{
    public function find(int $id_banca, int $id_orgao): array;

}
