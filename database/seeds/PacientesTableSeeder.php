<?php

use Illuminate\Database\Seeder;

class PacientesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Pacientes::create([
            'nome' => str_random(10),
            'telefone' => str_random(11),
            'email' => str_random(10).'@gmail.com',
            'cpf' => str_random(11),
        ]);
    }
}
