<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;


class EventFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Event::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $days = rand(1, 354);
        $hours = rand(0, 4);

        return [
            'title' => $this->faker->word,
            'description' => $this->faker->sentence,
            'start_date' => Carbon::now()->subDays($days),
            'start_time' => $this->faker->dateTimeBetween(
                \Carbon\Carbon::now()->startOfDay(),
                \Carbon\Carbon::now()->endOfDay()
            ),
            'event_length' => Carbon::now()->hour($hours),
            'building_number' => $this->faker->buildingNumber,
            'building_street_name' => $this->faker->streetName,
            'building_name' => $this->faker->streetSuffix,
            'city' => $this->faker->city,
            'county' => $this->faker->state,
            'postal_code' => $this->faker->postcode,
            'country' => $this->faker->country,
            'phone' => $this->faker->phoneNumber,
            'is_online' => $this->faker->boolean,
        ];
    }
}
