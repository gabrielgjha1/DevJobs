<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HabilidadesSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('habilidades')->insert([
            'nombre'=>'PHP',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);

        DB::table('habilidades')->insert([
            'nombre'=>'Laravel',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);
        DB::table('habilidades')->insert([
            'nombre'=>'Angular',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);

        DB::table('habilidades')->insert([
            'nombre'=>'JS',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);

        DB::table('habilidades')->insert([
            'nombre'=>'Vue',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);

        DB::table('habilidades')->insert([
            'nombre'=>'C',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);


        DB::table('habilidades')->insert([
            'nombre'=>'Java',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);


        DB::table('habilidades')->insert([
            'nombre'=>'Spring',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);


        DB::table('habilidades')->insert([
            'nombre'=>'Inteligencia artificial',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);

    }
}
