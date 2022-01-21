<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\User;
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

        return [
            'user_id' => User::factory(),
            'title' => $this->faker->word,
            'description' => $this->faker->sentence,
            'start_date_time' => Carbon::now()->subDays($days),
            'building_number' => $this->faker->buildingNumber,
            'street' => $this->faker->streetName,
            'building_name' => $this->faker->streetSuffix,
            'city' => $this->faker->city,
            'county' => $this->faker->state,
            'postal_code' => $this->faker->postcode,
            'country' => $this->faker->country,
            'phone' => $this->faker->phoneNumber,
            'email'=> $this->faker->email,
            'is_online' => $this->faker->boolean,
            'photo' => $this->faker->image('public/images', 200, 200, 'cats')
        ];
    }
}
