<?php

namespace Database\Seeders;

use App\Models\Train;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker;

class TrainsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        for($i = 0; $i < 10; $i++){
            $faker = Faker\Factory::create('it_IT');
            $newTrain = new Train();
            $newTrain->azienda = $faker->randomElement(['Italo','Trenitalia','Leonardo','Intercity Regionale']);
            $newTrain->codice_treno = $faker->numberBetween(10000,50000);
            $newTrain->numero_carrozze = $faker->numberBetween(1,14);
            $newTrain->orario_partenza = $faker->time('H:i:s', 'now');
            /* Creo una variabile per dare orario di arrivo fake */
            $orario_p = strtotime($newTrain->orario_partenza);
            $orario_a = strtotime('+3 hours', $orario_p);
            $newTrain->stazione_partenza = $faker->randomElement(['Termini', 'Napoli Centrale', 'Milano Centrale', 'Trento', 'Bologna Centrale']);
            $newTrain->orario_arrivo = $faker->time('H:i:s', $orario_a);
            $newTrain->stazione_arrivo = $faker->randomElement(['Roma Tiburtina', 'Firenze SM Novella', 'Bari Centrale', 'Bolzano', 'Roma San Pietro']);
            $newTrain->cancellato = $faker->randomElement([0,1]);
            $newTrain->in_orario = $faker->randomElement([0,1]);
            $newTrain->partenza_odierna = $faker->dateTimeBetween('now','+1 day');
            $newTrain->save();
        }
    }
}
