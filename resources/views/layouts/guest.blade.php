<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body class="antialiased bg-slate-50">
    <div class="isolate bg-white relative z-50">        
            <div class="lg:container mx-auto relative px-6 pt-6 lg:px-8">
                <nav class="flex items-center justify-between" aria-label="Global">
                <div class="flex lg:flex-1">
                    <a href="{{ route('/') }}" class="-m-1.5 p-1.5">
                    <span class="sr-only">PegiJauh</span>
                    <img class="w-20 md:w-24" alt="hero" src="{{ asset('storage/img/logo.png') }}"> 
                    </a>
                </div>
                <div class="lg:hidden">
                    <button id="open-mobile-menu" type="button" class="rounded-md p-2.5 text-gray-700">
                    <span class="sr-only">Open main menu</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    </button>
                </div>
                <div class="hidden lg:flex lg:gap-x-12">
                    <a href="{{ route('/') }}" class="text-base font-semibold leading-6 text-gray-900 hover:bg-yellow-300 hover:rounded-lg py-1 px-3">Home</a>
                    
                    <a href="#" class="text-base font-semibold leading-6 text-gray-900 hover:bg-yellow-300 hover:rounded-lg py-1 px-3">Service</a>

                    <a href="#" class="text-base font-semibold leading-6 text-gray-900 hover:bg-yellow-300 hover:rounded-lg py-1 px-3">Promo</a>
            
                    <a href="#" class="text-base font-semibold leading-6 text-gray-900 hover:bg-yellow-300 hover:rounded-lg py-1 px-3">Gallery</a>

                    <a href="#" class="text-base font-semibold leading-6 text-gray-900 hover:bg-yellow-300 hover:rounded-lg py-1 px-3">Our Team</a>
            
                    <a href="{{ route('about') }}" class="text-base font-semibold leading-6 text-gray-900 hover:bg-yellow-300 hover:rounded-lg py-1 px-3">About Us</a>
                </div> 
                <div class="hidden">
                    <a href="#" class="text-base  font-semibold leading-6 text-gray-900 hover:bg-yellow-300 hover:rounded-lg py-1 px-3">Log in <span aria-hidden="true">&rarr;</span></a>
                </div>
                </nav>
                <!-- Mobile menu, show/hide based on menu open state. -->
                <div id="mobile-menu" class="relative transition opacity-0 z-50">
                  <div class="fixed inset-0 z-50 overflow-y-auto bg-white px-6 py-6 lg:hidden">
                      <div class="flex items-center justify-between">
                        <a href="#" class="-m-1.5 p-1.5">
                            <span class="sr-only">PegiJauh</span>
                            <img class="w-20" alt="hero" src="{{ asset('storage/img/logo.png') }}"> 
                        </a>
                        <button id="close-mobile-menu" type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700">
                            <span class="sr-only">Close menu</span>
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                      </div>
                      <div class="mt-6 flow-root">
                        <div class="-my-6 divide-y divide-gray-500/10">
                            <div class="space-y-2 py-6">
                              <a href="{{ route('/') }}" class="-mx-3 block rounded-lg py-2 px-3 text-base font-semibold leading-7 text-gray-900 hover:bg-yellow-300/10">Home</a>
    
                              <a href="#" class="-mx-3 block rounded-lg py-2 px-3 text-base font-semibold leading-7 text-gray-900 hover:bg-yellow-300/10">Service</a>
    
                              <a href="#" class="-mx-3 block rounded-lg py-2 px-3 text-base font-semibold leading-7 text-gray-900 hover:bg-yellow-300/10">Promo</a>
    
                              <a href="#" class="-mx-3 block rounded-lg py-2 px-3 text-base font-semibold leading-7 text-gray-900 hover:bg-yellow-300/10">Gallery</a>
    
                              <a href="#" class="-mx-3 block rounded-lg py-2 px-3 text-base font-semibold leading-7 text-gray-900 hover:bg-yellow-300/10">Our Team</a>
    
                              <a href="{{ route('about') }}" class="-mx-3 block rounded-lg py-2 px-3 text-base font-semibold leading-7 text-gray-900 hover:bg-yellow-300/10">About Us</a>
                            </div>
                        </div>
                      </div>
                  </div>
                </div>
            </div>
    </div>

    {{ $slot }}

    <footer class="text-gray-600 body-font">
    <div class="container px-5 mx-auto pt-16">
  <div class="grid gap-10 row-gap-6 mb-8 sm:grid-cols-2 lg:grid-cols-4">
    <div class="sm:col-span-2">
      <a href="/" aria-label="Go home" title="Company" class="inline-flex items-center">
        <img class="w-20 md:w-24" alt="hero" src="{{ asset('storage/img/logo.png') }}"> 
        
      </a>
      <div class="mt-6 lg:max-w-sm">
        <p class="text-sm text-gray-800">
          PT. Pegi Jauh Meraih Mimpi
        </p>
        <p class="mt-4 text-sm text-gray-800">
          Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
        </p>
      </div>
    </div>
    <div class="space-y-2 text-sm">
      <p class="text-base font-bold tracking-wide text-gray-900">Contacts</p>
      <div class="flex">
        <p class="mr-1 text-gray-800">Phone:</p>
        <a href="tel:850-123-5021" aria-label="Our phone" title="Our phone" class="transition-colors duration-300 text-deep-purple-accent-400 hover:text-deep-purple-800">850-123-5021</a>
      </div>
      <div class="flex">
        <p class="mr-1 text-gray-800">Email:</p>
        <a href="mailto:info@lorem.mail" aria-label="Our email" title="Our email" class="transition-colors duration-300 text-deep-purple-accent-400 hover:text-deep-purple-800">info@lorem.mail</a>
      </div>
      <div class="flex">
        <p class="mr-1 text-gray-800">Address:</p>
        <a href="https://www.google.com/maps" target="_blank" rel="noopener noreferrer" aria-label="Our address" title="Our address" class="transition-colors duration-300 text-deep-purple-accent-400 hover:text-deep-purple-800">
          312 Lovely Street, NY
        </a>
      </div>
    </div>
    <div>
      <span class="text-base font-bold tracking-wide text-gray-900">Social</span>
      <div class="flex items-center mt-1 space-x-3">
        <a href="/" class="text-gray-500 transition-colors duration-300 hover:text-deep-purple-accent-400">
          <svg viewBox="0 0 24 24" fill="currentColor" class="h-5">
            <path
              d="M24,4.6c-0.9,0.4-1.8,0.7-2.8,0.8c1-0.6,1.8-1.6,2.2-2.7c-1,0.6-2,1-3.1,1.2c-0.9-1-2.2-1.6-3.6-1.6 c-2.7,0-4.9,2.2-4.9,4.9c0,0.4,0,0.8,0.1,1.1C7.7,8.1,4.1,6.1,1.7,3.1C1.2,3.9,1,4.7,1,5.6c0,1.7,0.9,3.2,2.2,4.1 C2.4,9.7,1.6,9.5,1,9.1c0,0,0,0,0,0.1c0,2.4,1.7,4.4,3.9,4.8c-0.4,0.1-0.8,0.2-1.3,0.2c-0.3,0-0.6,0-0.9-0.1c0.6,2,2.4,3.4,4.6,3.4 c-1.7,1.3-3.8,2.1-6.1,2.1c-0.4,0-0.8,0-1.2-0.1c2.2,1.4,4.8,2.2,7.5,2.2c9.1,0,14-7.5,14-14c0-0.2,0-0.4,0-0.6 C22.5,6.4,23.3,5.5,24,4.6z"
            ></path>
          </svg>
        </a>
        <a href="/" class="text-gray-500 transition-colors duration-300 hover:text-deep-purple-accent-400">
          <svg viewBox="0 0 30 30" fill="currentColor" class="h-6">
            <circle cx="15" cy="15" r="4"></circle>
            <path
              d="M19.999,3h-10C6.14,3,3,6.141,3,10.001v10C3,23.86,6.141,27,10.001,27h10C23.86,27,27,23.859,27,19.999v-10   C27,6.14,23.859,3,19.999,3z M15,21c-3.309,0-6-2.691-6-6s2.691-6,6-6s6,2.691,6,6S18.309,21,15,21z M22,9c-0.552,0-1-0.448-1-1   c0-0.552,0.448-1,1-1s1,0.448,1,1C23,8.552,22.552,9,22,9z"
            ></path>
          </svg>
        </a>
        <a href="/" class="text-gray-500 transition-colors duration-300 hover:text-deep-purple-accent-400">
          <svg viewBox="0 0 24 24" fill="currentColor" class="h-5">
            <path
              d="M22,0H2C0.895,0,0,0.895,0,2v20c0,1.105,0.895,2,2,2h11v-9h-3v-4h3V8.413c0-3.1,1.893-4.788,4.659-4.788 c1.325,0,2.463,0.099,2.795,0.143v3.24l-1.918,0.001c-1.504,0-1.795,0.715-1.795,1.763V11h4.44l-1,4h-3.44v9H22c1.105,0,2-0.895,2-2 V2C24,0.895,23.105,0,22,0z"
            ></path>
          </svg>
        </a>
      </div>
      <p class="mt-4 text-sm text-gray-500">
        Bacon ipsum dolor amet short ribs pig sausage prosciutto chicken spare ribs salami.
      </p>
    </div>
  </div>
  <div class="flex flex-col-reverse justify-between pt-5 pb-5 border-t lg:flex-row">
    <p class="text-sm text-gray-600">
      © Copyright 2023 Pegi Jauh.  <a href="https://www.instagram.com/pangga.ds/" rel="noopener noreferrer" class="text-gray-600 ml-1" target="_blank">Created By @pangga.ds</a>
    </p>
    <ul class="flex flex-col mb-3 space-y-2 lg:mb-0 sm:space-y-0 sm:space-x-5 sm:flex-row">
      <li>
        <a href="/" class="text-sm text-gray-600 transition-colors duration-300 hover:text-deep-purple-accent-400">F.A.Q</a>
      </li>
      <li>
        <a href="/" class="text-sm text-gray-600 transition-colors duration-300 hover:text-deep-purple-accent-400">Privacy Policy</a>
      </li>
      <li>
        <a href="/" class="text-sm text-gray-600 transition-colors duration-300 hover:text-deep-purple-accent-400">Terms &amp; Conditions</a>
      </li>
    </ul>
  </div>
</div>
</footer>

  <script>
     //Start Hamburger Menu
     document.getElementById('close-mobile-menu').addEventListener('click', function() {
            document.getElementById('mobile-menu').classList.toggle('opacity-0');
        });

        document.getElementById('open-mobile-menu').addEventListener('click', function() {
            document.getElementById('mobile-menu').classList.toggle('opacity-0');
        });
        //END Hamburger Menu
  </script>

    </body>
</html>