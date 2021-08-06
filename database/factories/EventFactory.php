<?php

namespace Database\Factories;

use App\Models\Channel;
use App\Models\Event;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        return [
            'name'          => $this->faker->sentence(),
            'manager'       => function() {
                return User::factory()->create()->id;
            },
            'user_id'       => function() {
                return User::factory()->create()->id;
            },
            'reg_deadline'  => Carbon::now()->add(rand(0,100), 'day')
        ];
    }


    public function configure()
    {
        return $this->afterCreating(function (Event $event) {
            $channel = Channel::factory()->create();

            $date = Carbon::now()->format('Y-m-d');
            $time = Carbon::now()->format('H:i:s');

            $event->channels()->attach($channel, ['venue' => 'stechmax office', 'event_date' => $date, 'time' => $time, 'url' => 'www.stechmax.com' ]);
        });
    }
}
