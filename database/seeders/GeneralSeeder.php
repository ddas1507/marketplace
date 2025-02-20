<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GeneralSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
	    DB::table('generals')->insert([
			    [
					    'store_logo' => '/backend/assets/img/maxima-plast-logotipo.png',
					    'store_nome_loja' => 'Maxima Plast',
					    'store_nome_fantasia' => 'MAXIMAPLASTIC INDUSTRIA E COMERCIO DE PLASTICOS LTDA.',
					    'footer_info' => 'Todos os Direitos Reservados.',
			    ],
	    ]);
    }
}
