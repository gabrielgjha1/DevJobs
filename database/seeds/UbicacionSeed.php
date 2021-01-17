<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UbicacionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ubicacions')->insert([
            'nombre'=>'Remono',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);

        DB::table('ubicacions')->insert([
            'nombre'=>'España',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);

        DB::table('ubicacions')->insert([
            'nombre'=>'USA',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);

        DB::table('ubicacions')->insert([
            'nombre'=>'Suiza',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);

        DB::table('ubicacions')->insert([
            'nombre'=>'Suecia',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);

        DB::table('ubicacions')->insert([
            'nombre'=>'Argentina',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);

        DB::table('ubicacions')->insert([
            'nombre'=>'Argentina',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);


    }
}
