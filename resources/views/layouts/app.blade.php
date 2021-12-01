<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Alpine Js - Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    @livewireStyles
    
    @stack('styles')

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
  </head>
  <body class="font-sans antialiased">
    <x-jet-banner />

    <div class="min-h-screen bg-gray-100">
      @livewire('navigation-menu')

      <!-- Page Heading -->
      @if (isset($header))
      <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
          {{ $header }}
        </div>
      </header>
      @endif

      <!-- Page Content -->
      <main>
        <!-- Prueba Alpine Js -->
        <div x-data="{ show: false }">
          <button @click="show = !show">Mostrar</button>
          <h1 x-show="show">Alpine Js esta trabajando!</h1>
        </div>
        <hr>
    
        <div x-data>
          <button @click="alert('Alpine Js esta trabajando!')">Click</button>
        </div>

        <!-- Prueba Tailwind Css -->
        <div class="p-6 max-w-sm mx-auto bg-white rounded-xl shadow-md flex items-center space-x-4">
          <div class="flex-shrink-0">
            <svg class="h-12 w-12" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg"><defs><linearGradient x1="50%" y1="0%" x2="50%" y2="100%" id="a"><stop stop-color="#2397B3" offset="0%"></stop><stop stop-color="#13577E" offset="100%"></stop></linearGradient><linearGradient x1="50%" y1="0%" x2="50%" y2="100%" id="b"><stop stop-color="#73DFF2" offset="0%"></stop><stop stop-color="#47B1EB" offset="100%"></stop></linearGradient></defs><g fill="none" fill-rule="evenodd"><path d="M28.872 22.096c.084.622.128 1.258.128 1.904 0 7.732-6.268 14-14 14-2.176 0-4.236-.496-6.073-1.382l-6.022 2.007c-1.564.521-3.051-.966-2.53-2.53l2.007-6.022A13.944 13.944 0 0 1 1 24c0-7.331 5.635-13.346 12.81-13.95A9.967 9.967 0 0 0 13 14c0 5.523 4.477 10 10 10a9.955 9.955 0 0 0 5.872-1.904z" fill="url(#a)" transform="translate(1 1)"></path><path d="M35.618 20.073l2.007 6.022c.521 1.564-.966 3.051-2.53 2.53l-6.022-2.007A13.944 13.944 0 0 1 23 28c-7.732 0-14-6.268-14-14S15.268 0 23 0s14 6.268 14 14c0 2.176-.496 4.236-1.382 6.073z" fill="url(#b)" transform="translate(1 1)"></path><path d="M18 17a2 2 0 1 0 0-4 2 2 0 0 0 0 4zM24 17a2 2 0 1 0 0-4 2 2 0 0 0 0 4zM30 17a2 2 0 1 0 0-4 2 2 0 0 0 0 4z" fill="#FFF"></path></g></svg>
          </div>
          <div>
            <div class="text-xl font-medium text-black">ChitChat</div>
            <p class="text-gray-500">Tiene un nuevo mensaje!</p>
          </div>
        </div>

        <!-- Regular -->
        <i class="fa fa-desktop fa-lg"></i>        
        <!-- Solid -->
        <i class="fas fa-user"></i>
        <!-- Brand -->
        <i class="fab fa-dev"></i>
        
        {{ $slot }}
      </main>
    </div>

    @stack('modals')

    @livewireScripts
    
    @stack('scripts')
  </body>
</html>