<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PacienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'names' => $this->faker->firstName,
            'lastnames' => $this ->faker->lastName,
            'rut' => $this ->faker->numerify('########-#'),
            'birthday' => $this->faker->date,
            'consulta' => $this->faker->date,
            'telephone' => $this ->faker->numerify('9########'),
            'email' => $this ->faker->email,
            'anamnesis' => $this ->faker->text,
            'observacion' => $this ->faker->text,
            'foto' => $this ->faker->image('public/FotosPerfil',640,480, null, false),
            'anexo' => $this ->faker->image('public/anamnesis',640,480, null, false),
            'user_id' => rand(1,5),
            'asignado' => rand(1,5)

        ];
    }
}
