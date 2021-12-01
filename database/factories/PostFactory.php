<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
  protected $model = Post::class;
  
  public function definition()
  {
    $userArr = User::pluck('id')->toArray();
    $title   = $this->faker->sentence(3);

    return [
        'title' => $title,
        'slug' => Str::slug($title),
        'description' => $this->faker->paragraph(),
        'user_id' => $this->faker->randomElement($userArr),
    ];
  }
}