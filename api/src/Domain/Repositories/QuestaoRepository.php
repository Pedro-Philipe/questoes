<?php
/**
 * Created by PhpStorm.
 * User: pedro
 * Date: 05/02/20
 * Time: 02:51
 */

namespace App\Domain\Repositories;


interface QuestaoRepository
{
    public function findAll(): array;

    public function findById(int $id);
}
