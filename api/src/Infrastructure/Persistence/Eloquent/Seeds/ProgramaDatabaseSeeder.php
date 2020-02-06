<?php

namespace App\Infrastructure\Persistence\Eloquent\Seeds;

use Illuminate\Database\Seeder;

class ProgramaDatabaseSeeder extends Seeder
{

    public function run()
    {
        $this->call(BancaTableSeeder::class);
        $this->call(OrgaoTableSeeder::class);
        $this->call(AssuntoTableSeeder::class);
        $this->call(QuestaoTableSeeder::class);


    }
}
