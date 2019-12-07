<?php

use Illuminate\Database\Seeder;
use App\Configuration;
class ConfigurationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $configuration = new Configuration();
       $configuration->segundos = 15;

       $configuration->save();
    }
}
