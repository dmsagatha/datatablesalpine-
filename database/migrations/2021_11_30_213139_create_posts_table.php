<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
  public function up()
  {
    Schema::create('posts', function (Blueprint $table) {
      $table->id();
      $table->foreignIdFor(User::class)->constrained();

      $table->string('title')->unique();
      $table->string('slug');
      $table->text('description');
      $table->timestamps();
    });
  }

  public function down()
  {
    Schema::dropIfExists('posts');
  }
}