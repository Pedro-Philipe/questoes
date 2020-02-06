<?php
/**
 * Created by PhpStorm.
 * User: pedro
 * Date: 05/02/20
 * Time: 02:50
 */

namespace App\Domain\Repositories;


interface OrgaoRepository
{
    public function findAll(): array;

}
