<?php

namespace Database\Seeders;
use App\Models\Personal;
use Illuminate\Database\Seeder;


class PersonalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Personal::create([
            'nombre' => 'Emma',
            'direccion'=>'10 anillo',
            'telefono'=>'68931912',
            'ci'=>'1340833',
            'cargo'=> 'educador',
            'sala'  => '1',
            'userId' => '1',
        ]);
    }
}
