<?php

namespace Database\Factories;

use App\Models\Curso;
use Illuminate\Database\Eloquent\Factories\Factory;

class CursoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Curso::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
       // Ayuda sobre los Factories en https://laravel.com/docs/7.x/database-testing#writing-factories
       // El uso de la clase Faker se puede ver en https://github.com/fzaninotto/Faker
        return [
            'nombre'=>$this->faker->name(), 
            'descripcion'=>$this->faker->text(), 
            'precio'=>$this->faker->randomFloat(2,0,10000)
        ];
    }
}
