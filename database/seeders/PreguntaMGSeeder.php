<?php

namespace Database\Seeders;

use App\Models\Pregunta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PreguntaMGSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pregunta::create([
            'item' => 1,
            'pregunta' => 'levanta la cabeza y el pecho cuando está boca abajo',
            'edadId' => 1,
            'areaId' => 1,
        ]);

        Pregunta::create([
            'item' => 2,
            'pregunta' => 'mueve los brazos y las piernas de manera suelta y desorganizadas',
            'edadId' => 1,
            'areaId' => 1,
        ]);

        Pregunta::create([
            'item' => 3,
            'pregunta' => 'reacciona al agarrarlo de las manos y tirar suavemente',
            'edadId' => 1,
            'areaId' => 1,
        ]);

        Pregunta::create([
            'item' => 4,
            'pregunta' => 'se mantiene boca abajo con los brazos extendidos y levanta el pecho',
            'edadId' => 2,
            'areaId' => 1,
        ]);

        Pregunta::create([
            'item' => 5,
            'pregunta' => 'se da vuelta de la posición boca abajo a la posición boca arriba',
            'edadId' => 2,
            'areaId' => 1,
        ]);

        Pregunta::create([
            'item' => 6,
            'pregunta' => 'se sienta sin apoyo durante unos segundos',
            'edadId' => 2,
            'areaId' => 1,
        ]);

        Pregunta::create([
            'item' => 7,
            'pregunta' => 'se pone de pie con apoyo',
            'edadId' => 3,
            'areaId' => 1,
        ]);

        Pregunta::create([
            'item' => 8,
            'pregunta' => 'se arrastra hacia adelante sobre sus manos y rodillas',
            'edadId' => 3,
            'areaId' => 1,
        ]);

        Pregunta::create([
            'item' => 9,
            'pregunta' => 'se sienta sin apoyo durante períodos prolongados',
            'edadId' => 3,
            'areaId' => 1,
        ]);

        Pregunta::create([
            'item' => 10,
            'pregunta' => 'camina solo/a',
            'edadId' => 4,
            'areaId' => 1,
        ]);

        Pregunta::create([
            'item' => 11,
            'pregunta' => 'sube y baja escalones con ayuda',
            'edadId' => 4,
            'areaId' => 1,
        ]);

        Pregunta::create([
            'item' => 12,
            'pregunta' => 'patea una pelota hacia adelante',
            'edadId' => 4,
            'areaId' => 1,
        ]);

        Pregunta::create([
            'item' => 13,
            'pregunta' => 'corre sin caerse',
            'edadId' => 5,
            'areaId' => 1,
        ]);

        Pregunta::create([
            'item' => 14,
            'pregunta' => 'en su lugar con ambos pies juntos',
            'edadId' => 5,
            'areaId' => 1,
        ]);

        Pregunta::create([
            'item' => 15,
            'pregunta' => 'lanza una pelota con el brazo extendido hacia adelante',
            'edadId' => 5,
            'areaId' => 1,
        ]);

        Pregunta::create([
            'item' => 16,
            'pregunta' => 'corre sin problemas y cambia de dirección',
            'edadId' => 6,
            'areaId' => 1,
        ]);

        Pregunta::create([
            'item' => 17,
            'pregunta' => 'salta con ambos pies y puede aterrizar sin perder el equilibrio',
            'edadId' => 6,
            'areaId' => 1,
        ]);

        Pregunta::create([
            'item' => 18,
            'pregunta' => 'puede subir y bajar escalones sin ayudas',
            'edadId' => 6,
            'areaId' => 1,
        ]);

        Pregunta::create([
            'item' => 19,
            'pregunta' => 'camina hacia adelante y hacia atrás en línea recta sin perder el equilibrio',
            'edadId' => 7,
            'areaId' => 1,
        ]);

        Pregunta::create([
            'item' => 20,
            'pregunta' => 'puede pararse y mantener el equilibrio sobre un solo pie durante unos segundos',
            'edadId' => 7,
            'areaId' => 1,
        ]);

        Pregunta::create([
            'item' => 21,
            'pregunta' => 'puede lanzar una pelota con precisión y coordinación',
            'edadId' => 7,
            'areaId' => 1,
        ]);

        Pregunta::create([
            'item' => 22,
            'pregunta' => 'puede correr rápidamente y hacer cambios de dirección sin dificultad',
            'edadId' => 8,
            'areaId' => 1,
        ]);

        Pregunta::create([
            'item' => 23,
            'pregunta' => 'puede saltar en un pie durante varios segundos',
            'edadId' => 8,
            'areaId' => 1,
        ]);

        Pregunta::create([
            'item' => 24,
            'pregunta' => ' puede atrapar una pelota con las manos extendidas y coordinación',
            'edadId' => 8,
            'areaId' => 1,
        ]);
    }
}
