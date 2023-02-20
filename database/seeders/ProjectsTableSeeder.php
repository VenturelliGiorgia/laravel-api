<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $types = Type::all();
        $projects = Project::all();

        for ($i = 0; $i < 5; $i++) {
            $project = Project::create([
                'name' => 'Progetto ' . $faker->word(4, 99),
                'description' => $faker->realText(200),
                'cover_img' => 'https://picsum.photos/300',
                'github_link' => 'https://github.com/VenturelliGiorgia/' . $faker->word(),
                'type_id' => $types->random()->id,
            ]);
        }
    }
}
