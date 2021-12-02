<div class="bg-gray-200">
  <div class="mx-auto py-6 px-4" x-data="datatables()" x-cloak>
    <h1 class="text-3xl py-2 border-b mb-6">{{ __('List of Users') }}</h1>

    <!-- Buscar, Eliminación masiva/Exportar, Paginar, Mostrar/Ocultar columnas -->
    <div class="mb-4 flex justify-between items-center">
      <!-- Buscar -->
      <div class="flex-1 pr-4">
        <div class="relative md:w-2/3">
          <input type="search"
            class="w-full pl-10 pr-4 py-2 rounded-lg shadow focus:outline-none focus:shadow-outline text-gray-600 font-medium"
            placeholder="Buscar..." wire:model.debounce.500ms="search">
          <div class="absolute top-0 left-0 inline-flex items-center p-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-400" viewBox="0 0 24 24" stroke-width="2"
              stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <rect x="0" y="0" width="24" height="24" stroke="none"></rect>
              <circle cx="10" cy="10" r="7" />
              <line x1="21" y1="21" x2="15" y2="15" />
            </svg>
          </div>
        </div>
        @if($header_view)
          <div class="w-full mb-3">
            @include($header_view)
          </div>
        @endif
      </div>
    </div>

    <!-- Tabla | Información -->
    <div class="overflow-x-auto bg-white rounded-lg shadow overflow-y-auto relative">
      @if($models->isEmpty())
        <div>
          <p colspan=6>@lang('No results to display.')</p>
        </div>
      @else
        <table class="table {{ $table_class }} border-collapse table-auto w-full whitespace-no-wrap bg-white table-striped relative">
          <thead class="{{ $thead_class }}">
            <tr class="text-center w-24">
              @if($checkbox && $checkbox_side == 'left')
                @include('laravel-livewire-tables::checkbox-all')
              @endif

              @foreach($columns as $column)
                <th class="{{ $this->thClass($column->attribute) }} border-dashed border-t border-gray-200">
                  @if($column->sortable)
                    <span class="cursor-pointer" wire:click="sort('{{ $column->attribute }}')">
                      {{ $column->heading }}

                      @if ($sort_attribute == $column->attribute)
                        <i class="fa fa-sort-amount-{{ $sort_direction == 'asc' ? 'up-alt' : 'down' }}"></i>
                      @else
                        <i class="fa fa-sort-amount-up-alt" style="opacity: .35;"></i>
                      @endif
                    </span>                      
                  @else
                    {{ $column->heading }}
                  @endif
                </th>
              @endforeach

              @if($checkbox && $checkbox_side == 'right')
                @include('laravel-livewire-tables::checkbox-all')
              @endif
            </tr>
          </thead>
          <tbody>
            @foreach($models as $model)
            <tr class="{{ $this->trClass($model) }}">
              @if($checkbox && $checkbox_side == 'left')
                @include('laravel-livewire-tables::checkbox-row')
              @endif

              @foreach($columns as $column)
                <td class="border-dashed border-t border-gray-200{{ $this->tdClass($column->attribute, $value = Arr::get($model->toArray(), $column->attribute)) }}">
                  @if($column->view)
                    @include($column->view)
                  @else
                    {{ $value }}
                  @endif
                </td>
              @endforeach

              @if($checkbox && $checkbox_side == 'right')
                @include('laravel-livewire-tables::checkbox-row')
              @endif
            </tr>
            @endforeach
          </tbody>
        </table>
      @endif

      <div class="m-5">
        {{ $models->links() }}
      </div>

      @if($footer_view)
        <div class="w-full">
          @include($footer_view)
        </div>
      @endif
    </div>
  </div>
</div>

{{-- <div>
  <div class="row justify-content-between">
    <div class="col-auto order-last order-md-first">
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fa fa-search"></i></span>
        </div>
        <input type="search" class="form-control" placeholder="{{ __('Search') }}" wire:model="search">
      </div>
    </div>
    @if($header_view)
    <div class="col-md-auto mb-3">
      @include($header_view)
    </div>
    @endif
  </div>

  <div class="card mb-3">
    @if($models->isEmpty())
      <div class="card-body">
        {{ __('No results to display.') }}
      </div>
    @else
    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table {{ $table_class }} mb-0">
          <thead class="{{ $thead_class }}">
            <tr>
              @if($checkbox && $checkbox_side == 'left')
              @include('laravel-livewire-tables::checkbox-all')
              @endif

              @foreach($columns as $column)
              <th class="align-middle text-nowrap border-top-0 {{ $this->thClass($column->attribute) }}">
                @if($column->sortable)
                <span style="cursor: pointer;" wire:click="sort('{{ $column->attribute }}')">
                  {{ $column->heading }}

                  @if($sort_attribute == $column->attribute)
                  <i class="fa fa-sort-amount-{{ $sort_direction == 'asc' ? 'up-alt' : 'down' }}"></i>
                  @else
                  <i class="fa fa-sort-amount-up-alt" style="opacity: .35;"></i>
                  @endif
                </span>
                @else
                {{ $column->heading }}
                @endif
              </th>
              @endforeach

              @if($checkbox && $checkbox_side == 'right')
              @include('laravel-livewire-tables::checkbox-all')
              @endif
            </tr>
          </thead>
          <tbody>
            @foreach($models as $model)
            <tr class="{{ $this->trClass($model) }}">
              @if($checkbox && $checkbox_side == 'left')
              @include('laravel-livewire-tables::checkbox-row')
              @endif

              @foreach($columns as $column)
              <td
                class="align-middle {{ $this->tdClass($column->attribute, $value = Arr::get($model->toArray(), $column->attribute)) }}">
                @if($column->view)
                @include($column->view)
                @else
                {{ $value }}
                @endif
              </td>
              @endforeach

              @if($checkbox && $checkbox_side == 'right')
              @include('laravel-livewire-tables::checkbox-row')
              @endif
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    @endif
  </div>

  <div class="row justify-content-between">
    <div class="col-auto">
      {{ $models->links() }}
    </div>
    @if($footer_view)
    <div class="col-md-auto">
      @include($footer_view)
    </div>
    @endif
  </div>
</div> --}}