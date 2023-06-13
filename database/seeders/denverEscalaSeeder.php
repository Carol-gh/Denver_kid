<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\DenverEscala;

class denverEscalaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DenverEscala::create([
            'etiqueta' => 'Presente',
            'abreviatura' => 'P'
        ]);

        DenverEscala::create([
            'etiqueta' => 'Fallo',
            'abreviatura' => 'F'
        ]);


        DenverEscala::create([
            'etiqueta' => 'Retraso',
            'abreviatura' => 'R'
        ]);


        DenverEscala::create([
            'etiqueta' => 'No evaluable',
            'abreviatura' => 'N'
        ]);

    }
}
