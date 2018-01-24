<?php

use Illuminate\Database\Seeder;

class MedicosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Medicos::create([
            'nome' => str_random(10),
            'telefone' => str_random(11),
            'cpf' => str_random(11),
            'crm' => str_random(5),
        ]);
    }
}
