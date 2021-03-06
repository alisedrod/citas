<?php

use Illuminate\Database\Seeder;
use  Faker\Factory as Faker;

class EnfermedadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i = 1; $i <= 6; $i++) {
            DB::table('enfermedads')->insert(array(
                'id'=>$faker->unique()->numberBetween($min = 1, $max = 6),
                'name' => $faker->randomElement($array = array ('Arritmia','Bronquitis','Alergia al polen','Gripe','Gastronteritis','Neumonía')),
                'especialidad_id' => App\Especialidad::all()->random()->id,
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
            ));
        }
    }
}
