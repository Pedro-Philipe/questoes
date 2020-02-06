<?php
/**
 * Created by PhpStorm.
 * User: pedro
 * Date: 05/02/20
 * Time: 02:54
 */

namespace App\Domain\Repositories;


interface BancaRepository
{
    public function findAll(): array;

}
