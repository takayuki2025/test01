<?php



namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as FakerFactory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $faker = FakerFactory::create('ja_JP');
        $categoryId = $faker->numberBetween(1, 5);
        $userId = \App\Models\User::factory()->create()->id;

        return [
        'first_name' => $this->faker->lastName(),
        'last_name' => $this->faker->firstName(),
        'gender'=> $this->faker->numberBetween(1,3),
        'email' => $this->faker->safeEmail(),
        'tel' => $faker->regexify('[0-9]{10,11}'),
        'address' => $this->faker->address(),
        'building' => $this->faker->secondaryAddress(),
        'detail' => $faker->realText(25),

        'category_id' => $categoryId,
        'user_id' => $userId,
        ];
    }
}
