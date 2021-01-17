<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExperienciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('experiencias')->insert([
            'nombre'=>'0 - 6 Meses',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);


        DB::table('experiencias')->insert([
            'nombre'=>'6 Meses - 1 Año',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);

        DB::table('experiencias')->insert([
            'nombre'=>'1 Año - 3 años',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);

        DB::table('experiencias')->insert([
            'nombre'=>'3 Años - 6 Años',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);

        DB::table('experiencias')->insert([
            'nombre'=>'Mayor a 6 años',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);

    }
}
