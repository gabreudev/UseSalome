<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\Categoria;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produto>
 */
class ProdutoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $nome = $this->faker->unique()->sentence();
        return [
            'nome'=> $nome,
            'descricao'=> 'descrição generica apenas para teste',
            'preco'=> $this->faker->randomNumber(2),
            'slug' => Str::slug($nome),
            'image'=> $this->faker->imageUrl(400,400),
            'quantidade' => $this->faker->randomNumber(2),
            'id_categoria' => Categoria::pluck('id')->random(),
        ];
    }
}
