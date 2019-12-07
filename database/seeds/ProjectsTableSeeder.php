<?php

use Illuminate\Database\Seeder;
use App\Project;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $project = new Project();
        $project->nombre = "Pagina Web CONTIE";
        $project->descripcion = "Crear la pagina web para los servicios que requiera SISALARM que se llevara acabo en todo los municipios de la BCS";
        $project->fechaInicio = "2019-11-15";
        $project->fechaCierre = "2019-12-31";
        $project->save();


        $project = new Project();
        $project->nombre = "Reloj Checador";
        $project->descripcion = "Crear una aplicacion web que registre la entrada y salida de los miembros del taller de desarrollo";
        $project->fechaInicio = "2019-11-24";
        $project->fechaCierre = "2019-12-24";
        $project->save();
    }
}
