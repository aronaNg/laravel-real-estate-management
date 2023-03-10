<?php

namespace Database\Factories;

use App\Models\Ticket;
use Illuminate\Database\Eloquent\Factories\Factory;

class TicketFactory extends Factory
{
    protected $model = Ticket::class;

    public function definition()
    {
        return [
            'titre' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'nom_usager' => $this->faker->name(),
            'email_usager' => $this->faker->email(),
            'date_saisie' => $this->faker->dateTimeBetween('-1 month', 'now'),
            'statut' => $this->faker->randomElement(['nouveau', 'en cours', 'terminé', 'rejeté']),
            'id_biens' => $this->faker->numberBetween(1, 20),
        ];
    }
}
