<?php

use App\Habilidades;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->call(CategoriaSeed::class);
        $this->call(ExperienciaSeeder::class);
        $this->call(UbicacionSeed::class);
        $this->call(SalarioSeed::class);
        $this->call(HabilidadesSeed::class);
    }
}
