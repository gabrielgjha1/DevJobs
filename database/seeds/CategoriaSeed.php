<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('categorias')->insert([
           'nombre'=>'Front End',
           'created_at'=>Carbon::now(),
           'updated_at'=>Carbon::now(),
       ]);

       DB::table('categorias')->insert([
        'nombre'=>'Front End',
        'created_at'=>Carbon::now(),
        'updated_at'=>Carbon::now(),
    ]);

    DB::table('categorias')->insert([
        'nombre'=>'Backend',
        'created_at'=>Carbon::now(),
        'updated_at'=>Carbon::now(),
    ]);

    DB::table('categorias')->insert([
        'nombre'=>'FUll Stack',
        'created_at'=>Carbon::now(),
        'updated_at'=>Carbon::now(),
    ]);

    DB::table('categorias')->insert([
        'nombre'=>'Diseño',
        'created_at'=>Carbon::now(),
        'updated_at'=>Carbon::now(),
    ]);

    DB::table('categorias')->insert([
        'nombre'=>'ux/ui',
        'created_at'=>Carbon::now(),
        'updated_at'=>Carbon::now(),
    ]);

    DB::table('categorias')->insert([
        'nombre'=>'seguridad',
        'created_at'=>Carbon::now(),
        'updated_at'=>Carbon::now(),
    ]);
    }
}
