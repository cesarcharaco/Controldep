<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProgramasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('programa')->insert([

        	['cod' => '02','programa' => 'Ingeniería en Maquinaria Pesada y Vehículos Automotrices'],
        	['cod' => 'E05','programa' => 'Electromecánica'],
        	['cod' => 'N4','programa' => 'Mecánica Automotriz en Maquinaria Pesada'],
        	['cod' => '01','programa' => 'Ingeniería en Maquinaria, Vehículos Automotrices y Sistemas Electrónicos'],
        	['cod' => 'ME','programa' => 'Técnico en Mecánica y Electromovilidad Automotriz']
        ]);
    }
}
