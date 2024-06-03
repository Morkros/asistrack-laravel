<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Student; //se añade el modelo Student para obtener acceso a los registros de la tabla students

class AssistFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            /**
             * se utiliza el método pluck con la clase Student para traer todos los valores de la columna dni
             * y luego seleccionar de forma aleatoria un elemento para crear el registro de asistencia
             * (pluck trae los datos de una columna en forma de array)
             */
            'student_id' => fake()->randomElement(Student::pluck('id')),
            'created_at' => $this->faker->dateTime(),
        ];
    }
}

