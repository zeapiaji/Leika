<?php

namespace Database\Factories;

use Carbon\Carbon;
use Closure;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $birthDate = fake()->dateTimeThisCentury();
        $now = Carbon::now();
        $age = $now->diffInYears($birthDate);
        return [
            'nama_lengkap' => fake()->name(),
            'username' => fake()->userName(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => Hash::make('zeapiaji'), // password
            'telp' => fake()->phoneNumber(),
            'alamat' => fake()->address(),
            'usia' => $age,
            'foto_profil' => Str::random(10),
            'remember_token' => Str::random(10),
        ];
    }

    
    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
