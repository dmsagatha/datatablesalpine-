<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  public function run()
  {
    Post::query()->delete();
    User::query()->delete();
    Role::query()->delete();

    DB::table('roles')->insert([
      ['rolename' => 'Super Admin', 'slug' => 'superadmin'],
      ['rolename' => 'Sub Admin', 'slug' => 'sub-admin'],
      ['rolename' => 'Employee', 'slug' => 'employee'],
      ['rolename' => 'Manager', 'slug' => 'manager'],
    ]);

    User::create([
      'name'     => 'Super Admin',
      'email'    => 'superadmin@admin.net',
      'role_id'  => 1,
      'phone'    => '1234567890',
      'password' => bcrypt('superadmin'),
    ]);

    User::factory(100)->create();

    Post::factory(100)->create();
  }
}