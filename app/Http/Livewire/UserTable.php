<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Kdion4891\LaravelLivewireTables\Column;
use Kdion4891\LaravelLivewireTables\TableComponent;

class UserTable extends TableComponent
{
  public $thead_class = 'thead-dark';
  public $sort_attribute = 'name';
  public $sort_direction = 'asc';

  // public $table_class = 'table-hover table-striped';

  // Casillas de verificación
  public $checkbox_side = 'left';

  public function query()
  {
    return User::with('role', 'posts');
  }

  public function columns()
  {
    return [
      Column::make('ID')->searchable()->sortable(),
      Column::make(__('Name'), 'name')->searchable()->sortable(),
      Column::make(__('Role'), 'role.rolename')->searchable()->sortable(),
      Column::make(__('Post'), 'posts.title')->searchable()->sortable(),
      Column::make(__('Email'), 'email')->searchable()->sortable(),
      Column::make(__('Created'), 'created_at')->searchable()->sortable(),
      Column::make(__('Updated'), 'updated_at')->searchable()->sortable(),
    ];
  }


  /**
   * https://github.com/kdion4891/laravel-livewire-tables/blob/master/src/TableComponent.php
   */
  public function render()
  {
    return $this->tableView();
  }

  /**
   * php artisan vendor:publish --tag=table-views
   * php artisan vendor:publish --tag=table-config
   */
  public function tableView()
  {
    return view('laravel-livewire-tables::table', [
      'columns' => $this->columns(),
      'models' => $this->models()->paginate($this->per_page),
    ]);
  }
}