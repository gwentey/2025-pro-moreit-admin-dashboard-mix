<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $faker = Faker::create('fr_FR');

        // Création d'un utilisateur test
        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Insertion des données pour landingpage
        DB::table('landingpage')->insert([
            'nom_page' => 'gift-aide-memoire',
            'cadeau_nom' => 'Aide mémoire',
            'type' => 'gift',
            'cadeau_path' => 'gift-landing-page/assets-lp/gift-aide-memoire/aidememoire.pdf',
            'email_html' => "Bonjour,<br><br>Voici votre cadeau. Profitez-en !<br><br>Cordialement, l'équipe More IT CS",
            'created_at' => now(),
            'IsDeleted' => 0
        ]);

        // Insertion des données pour prospect
        $prospects = [
            [
                'nom' => 'Rodrigues',
                'prenom' => 'Anthony',
                'email' => 'antoto6363@gmail.com',
                'date_enregistrement' => now(),
                'landingpage_id' => 1
            ]
        ];

        // Ajout de 30 faux prospects
        for ($i = 0; $i < 30; $i++) {
            $prospects[] = [
                'nom' => $faker->lastName,
                'prenom' => $faker->firstName,
                'email' => $faker->unique()->email,
                'date_enregistrement' => $faker->dateTimeBetween('-6 months', 'now'),
                'landingpage_id' => 1
            ];
        }

        // Insertion des prospects dans la base de données
        DB::table('prospect')->insert($prospects);
    }
}
