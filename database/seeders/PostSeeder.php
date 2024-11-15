<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $secondUser = User::skip(1)->first();

        if (!$secondUser) {
            $this->command->info('No hay un usuario disponible para generar posts.');
            return;
        }

        $categories = Category::all();

        if ($categories->isEmpty()) {
            $this->command->info('No hay categorías disponibles para generar posts.');
            return;
        }

        $titles = [
            'Avances en Inteligencia Artificial',
            'La exploración del espacio: un sueño hecho realidad',
            'El impacto del arte en la sociedad moderna',
            'Lecciones de las grandes civilizaciones',
            'Análisis de las obras de Gabriel García Márquez',
        ];

        foreach ($titles as $index => $title) {
            Post::create([
                'title' => $title,
                'content' => fake()->paragraphs(3, true),
                'user_id' => $secondUser->id,
                'category_id' => $categories[$index % $categories->count()]->id,
            ]);
        }
    }
}
