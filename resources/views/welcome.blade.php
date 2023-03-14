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
    <div class="isolate bg-gradient-to-b from-white via-white to-transparent">        
            <div class="container mx-auto relative px-6 pt-6 lg:px-8">
                <nav class="flex items-center justify-between" aria-label="Global">
                <div class="flex lg:flex-1">
                    <a href="#" class="-m-1.5 p-1.5">
                    <span class="sr-only">PegiJauh</span>
                    <img class="w-20 md:w-24" alt="hero" src="{{ asset('storage/img/logo.png') }}"> 
                    </a>
                </div>
                <div class="flex lg:hidden">
                    <button id="open-mobile-menu" type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
                    <span class="sr-only">Open main menu</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    </button>
                </div>
                <div class="hidden lg:flex lg:gap-x-12">
                    <a href="#" class="text-base font-semibold leading-6 text-gray-900 hover:bg-yellow-300 hover:rounded-lg py-1 px-3">Home</a>
                    
                    <a href="#" class="text-base font-semibold leading-6 text-gray-900 hover:bg-yellow-300 hover:rounded-lg py-1 px-3">Service</a>

                    <a href="#" class="text-base font-semibold leading-6 text-gray-900 hover:bg-yellow-300 hover:rounded-lg py-1 px-3">Promo</a>
            
                    <a href="#" class="text-base font-semibold leading-6 text-gray-900 hover:bg-yellow-300 hover:rounded-lg py-1 px-3">Gallery</a>

                    <a href="#" class="text-base font-semibold leading-6 text-gray-900 hover:bg-yellow-300 hover:rounded-lg py-1 px-3">Our Team</a>
            
                    <a href="#" class="text-base font-semibold leading-6 text-gray-900 hover:bg-yellow-300 hover:rounded-lg py-1 px-3">About Us</a>
                </div> 
                <div class="hidden">
                    <a href="#" class="text-base  font-semibold leading-6 text-gray-900 hover:bg-yellow-300 hover:rounded-lg py-1 px-3">Log in <span aria-hidden="true">&rarr;</span></a>
                </div>
                </nav>
                <!-- Mobile menu, show/hide based on menu open state. -->
                <div id="mobile-menu" class="transition opacity-0">
                <div class="fixed inset-0 z-10 overflow-y-auto bg-white px-6 py-6 lg:hidden">
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
                        <a href="#" class="-mx-3 block rounded-lg py-2 px-3 text-base font-semibold leading-7 text-gray-900 hover:bg-yellow-300/10">Home</a>
                        
                        <a href="#" class="-mx-3 block rounded-lg py-2 px-3 text-base font-semibold leading-7 text-gray-900 hover:bg-yellow-300/10">Service</a>

                        <a href="#" class="-mx-3 block rounded-lg py-2 px-3 text-base font-semibold leading-7 text-gray-900 hover:bg-yellow-300/10">Promo</a>
            
                        <a href="#" class="-mx-3 block rounded-lg py-2 px-3 text-base font-semibold leading-7 text-gray-900 hover:bg-yellow-300/10">Gallery</a>
                        
                        <a href="#" class="-mx-3 block rounded-lg py-2 px-3 text-base font-semibold leading-7 text-gray-900 hover:bg-yellow-300/10">Our Team</a>

                        <a href="#" class="-mx-3 block rounded-lg py-2 px-3 text-base font-semibold leading-7 text-gray-900 hover:bg-yellow-300/10">About Us</a>
                        </div>
                        
                    </div>
                    </div>
                </div>
                </div>
            </div>
            
            <main>
                <div class="relative px-6 lg:px-8">
                <img class="-z-20 hidden md:block absolute bottom-0 right-0 lg:right-20 md:h-full" src="{{ asset('storage/img/sapiens.png') }}"/>
                <div class="mx-auto max-w-7xl py-24 sm:py-48 lg:py-56">
                    
                    <div class="text-center md:max-w-xl md:text-left">
                    <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">Discover Wonderful Indonesia</h1>
                    <p class="mt-6 text-lg leading-8 text-gray-600">Let's travel around Indonesia with us!</p>
                    <div class="mt-10 flex items-center justify-center md:justify-start gap-x-6">
                        <a href="#" class="rounded-md bg-yellow-300 px-3.5 py-2.5 text-base font-semibold text-slate-800 shadow-sm hover:bg-yellow-300">Choose Destination</a>
                        
                    </div>
                    </div>
                </div>
                
                </div>
            </main>
    </div>

  <section class="text-gray-600 body-font">
    <div class="container px-5 py-24 mx-auto">
      <div class="text-center mb-20">
        <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900 mb-4">Our Services</h1>
        <p class="text-base leading-relaxed xl:w-2/4 lg:w-3/4 mx-auto text-gray-500s">Blue bottle crucifix vinyl post-ironic four dollar toast vegan taxidermy. Gastropub indxgo juice poutine, ramps microdosing banh mi pug.</p>
        <div class="flex mt-6 justify-center">
          <div class="w-16 h-1 rounded-full bg-yellow-400 inline-flex"></div>
        </div>
      </div>
      <div class="flex flex-wrap sm:-m-4 -mx-4 -mb-10 -mt-4 md:space-y-0 space-y-6">
      @forelse($services as $row)  
        <div class="p-4 md:w-1/3 flex flex-col text-center items-center">
          <div class="mb-5">
            <img class="" width="55" src="{{ $row->cover ? asset('storage/img/'.$row->cover) : 'https://dummyimage.com/1200x500' }}"/>
          </div>
          <div class="flex-grow">
            <h2 class="text-gray-900 text-lg title-font font-medium mb-3">{{ $row->nama }}</h2>
            <p class="leading-relaxed text-base">{{ $row->keterangan }}</p>
            <a class="mt-3 text-indigo-500 inline-flex items-center">Learn More
              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                <path d="M5 12h14M12 5l7 7-7 7"></path>
              </svg>
            </a>
          </div>
        </div>
      @empty

      @endforelse
    
      
      </div>
    </div>
  </section>

  <section class="text-gray-600 body-font">
    <div class="container px-5 py-24 mx-auto">
      <div class="flex flex-col">
        <div class="h-1 bg-gray-200 rounded overflow-hidden">
          <div class="w-24 h-full bg-yellow-400"></div>
        </div>
        <div class="flex flex-wrap sm:flex-row flex-col py-6 mb-12">
          <h1 class="sm:w-2/5 text-gray-900 font-medium title-font text-2xl mb-2 sm:mb-0"><span class="text-yellow-400 font-bold">Popular</span> Place</h1>
          <p class="ml-auto leading-relaxed text-base sm:pl-10 pl-0">Dibawah ini merupakan beberapa destinasi populer yang sering dipilih oleh para wisatawan.</p>
        </div>
      </div>
      <div class="flex flex-wrap sm:-m-4 -mx-4 -mb-10 -mt-4">
        
          @forelse($favorits as $row)  
            <div class="p-4 md:w-1/3 sm:mb-0 mb-6 hover:scale-105 transition-transform duration-700 ease-out">
              <div class="bg-white rounded-lg">
                <div class="rounded-lg h-64 overflow-hidden">
                  <img alt="content" class="object-cover object-center h-full w-full" src="{{ asset('storage/img/destinasi/'.$row->cover) }}">
                </div>
                <div class="p-4 -mt-3">
                  <h2 class="text-xl font-medium title-font text-gray-900 mt-5">{{ $row->nama }}</h2>
                  <p class="text-base leading-relaxed mt-2">{{ $row->keterangan }}</p>
                  <a class="text-indigo-500 inline-flex items-center mt-3">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-2" >
                      <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                      <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                    </svg>
                    
                    {{ $row->lokasi }}
                  </a>
                </div>
              </div> 
            </div>
          @empty

          @endforelse

      </div>
    </div>
  </section>

  <section class="text-gray-600 body-font">
    <div class="container px-5 py-24 mx-auto">
      <div class="flex flex-col text-center w-full mb-20">
        <h1 class="text-2xl font-medium title-font mb-4 text-gray-900">OUR TEAM</h1>
        <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Whatever cardigan tote bag tumblr hexagon brooklyn asymmetrical gentrify, subway tile poke farm-to-table. Franzen you probably haven't heard of them.</p>
      </div>
      <div class="flex flex-wrap -m-4">
      @forelse($teams as $row)  
        <div class="p-4 lg:w-1/4 md:w-1/2">
          <div class="h-full flex flex-col items-center text-center">

                      <img src="{{ $row->foto ? asset('storage/img/team/'.$row->foto) : 'https://dummyimage.com/1200x500' }}" class="flex-shrink-0 rounded-t-lg border-b-4 border-yellow-300 w-full object-cover object-center mb-4" alt="Cover Image" id="image-cover">
                      <div class="w-full">
                      <h2 class="title-font font-medium text-lg text-gray-900">{{ $row->nama }}</h2>
                      <h3 class="text-gray-500 mb-3">{{ $row->posisi }}</h3>
                      <p class="mb-4">{{ $row->keterangan }}</p>
                      <span class="inline-flex">
                      @if ($row->ig != null)
                          <a href="{{ $row->ig }}" target="_blank" class="text-gray-500">
                              <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                          </a>
                      @endif

                      @if ($row->twitter != null)
                          <a href="{{ $row->ig }}" target="_blank" class="ml-2 text-gray-500">
                              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                  <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path>
                              </svg>
                          </a>
                      @endif
                      
                      @if ($row->wa != null)
                          <a href="https://wa.me/{{ $row->wa }}" target="_blank" class="ml-2 text-gray-500">
                              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                  <path d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z"></path>
                              </svg>
                          </a>
                      @endif
                      </span>
            </div>
          </div>
        </div>
      @empty

      @endforelse
      </div>
    </div>
  </section>

  <section class="text-gray-600 body-font">
    <div class="container px-5 py-24 mx-auto">
      <div class="flex flex-col">
        <div class="h-1 bg-gray-200 rounded overflow-hidden">
          <div class="w-24 h-full bg-yellow-400"></div>
        </div>
        <div class="flex sm:flex-row flex-col py-6 mb-12">
          <h1 class="sm:w-2/5 text-gray-900 font-medium title-font text-2xl mb-2 sm:mb-0"><span class="text-yellow-400 font-bold">Explore</span> Place</h1>
          
          <p class="ml-auto leading-relaxed text-base sm:pl-10 pl-0">Telusuri beberapa destinasi yang yang sangat menarik.</p>
          
          
        </div>
      </div>
      
      
      <div class="flex flex-wrap sm:-m-4 -mx-4 -mb-10 -mt-4">
        @forelse($destinasis as $row)  
          <div class="p-4 md:w-1/3 sm:mb-0 mb-6 hover:scale-105 transition-transform duration-700 ease-out">
            <div class="bg-white rounded-lg">
              <div class="rounded-lg h-64 overflow-hidden">
                <img alt="content" class="object-cover object-center h-full w-full" src="{{ asset('storage/img/destinasi/'.$row->cover) }}">
              </div>
              <div class="p-4 -mt-3">
                <h2 class="text-xl font-medium title-font text-gray-900 mt-5">{{ $row->nama }}</h2>
                <p class="text-base leading-relaxed mt-2">{{ $row->keterangan }}</p>
                <a class="text-indigo-500 inline-flex items-center mt-3">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-2" >
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                  </svg>
                  
                  {{ $row->lokasi }}
                </a>
              </div>
            </div> 
          </div>
        @empty

        @endforelse

      </div>

      <a class="bg-yellow-300 py-2 px-6 text-base rounded font-semibold text-slate-800  inline-flex items-center mt-8">            
        View All Destination
        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
          <path d="M5 12h14M12 5l7 7-7 7"></path>
        </svg>
      </a>
    </div>
  </section>

  <section class="bg-gradient-to-t from-white via-white to-transparent text-gray-600 body-font pb-12">
    <div class="container px-5 py-24 mx-auto">
      <div class="flex flex-col text-center w-full mb-20">
        <h1 class="text-center mb-3  font-medium text-xl md:text-3xl"><span class="text-yellow-400 font-bold">Connect </span>With Us</h1>   
        <p class="text-center mb-2 md:mb-12">Tetap Terhubung dengan Kami di Media Sosial dan Dapatkan Informasi Terbaru Setiap Hari</p> 
      </div> 
      <div class="flex flex-wrap -m-4 text-center">
        <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
          <div class="border-2 border-gray-200 px-4 py-6 rounded-lg hover:bg-yellow-300 hover:scale-105 transition duration-500 group">
            <svg class=" mx-auto mb-2" xmlns="http://www.w3.org/2000/svg" width="52" height="52" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>
            <h2 class="title-font font-medium text-3xl text-gray-900">Facebook</h2>
            <a href="https://www.facebook.com/people/Pegijauh-Tours/100069676003588/?mibextid=ZbWKwL" target="_blank" class="cursor-pointer text-indigo-500 inline-flex items-center mt-1">Ikuti Kami
            </a>
          </div>
        </div>
        <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
          <div class="border-2 border-gray-200 px-4 py-6 rounded-lg hover:bg-yellow-300 hover:scale-105 transition duration-500 group">
            <svg class="mx-auto mb-2" xmlns="http://www.w3.org/2000/svg" width="52" height="52" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
            <h2 class="title-font font-medium text-3xl text-gray-900">Instragram</h2>
            <a href="https://www.instagram.com/pegijauh_tours/" target="_blank" class="cursor-pointer text-indigo-500 inline-flex items-center mt-1">Ikuti Kami
            </a>
          </div>
        </div>
        <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
          <div class="border-2 border-gray-200 px-4 py-6 rounded-lg hover:bg-yellow-300 hover:scale-105 transition duration-500 group">
            
            <svg class="mx-auto mb-2" xmlns="http://www.w3.org/2000/svg" width="52" height="52"  viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-music"><path d="M9 18V5l12-2v13"></path><circle cx="6" cy="18" r="3"></circle><circle cx="18" cy="16" r="3"></circle></svg>
            <h2 class="title-font font-medium text-3xl text-gray-900">TikTok</h2>
            <a href="https://www.tiktok.com/@pegijauhtours" target="_blank" class="cursor-pointer text-indigo-500 inline-flex items-center mt-1">Ikuti Kami
            </a>
          </div>
        </div>
        <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
          <div class="border-2 border-gray-200 px-4 py-6 rounded-lg hover:bg-yellow-300 hover:scale-105 transition duration-500 group">
            <svg class="mx-auto mb-2" xmlns="http://www.w3.org/2000/svg" width="52" height="52" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-youtube"><path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.33z"></path><polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02"></polygon></svg>
            <h2 class="title-font font-medium text-3xl text-gray-900">Youtube</h2>
            <a href="https://www.youtube.com/@pegijauhtours1999" target="_blank" class="cursor-pointer text-indigo-500 inline-flex items-center mt-1">Ikuti Kami
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <section class="text-gray-600 body-font bg-white">
    <div class="container px-5 py-24 mx-auto">
      <div class="flex flex-col text-center w-full mb-20">
        <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Our <span class="text-yellow-400 font-bold">Gallery</span></h1>
        <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Bagikan momen bahagia bersama kami</p>
      </div>
      <div class="grid gap-6 row-gap-5 mb-8 lg:grid-cols-4 sm:row-gap-6 sm:grid-cols-2">
      @forelse($galeris as $row)  
                
        <a href="/" aria-label="View Item">
          <div class="relative overflow-hidden transition duration-200 transform rounded shadow-lg hover:-translate-y-2 hover:shadow-2xl">
            <img class="object-cover w-full h-56 md:h-64 xl:h-80" src="{{ asset('storage/img/galeri/'.$row->foto) }}" alt="" />
            <div class="absolute inset-0 px-6 py-4 transition-opacity duration-200 bg-black bg-opacity-75 opacity-0 hover:opacity-100">
              <p class="mb-4 text-lg font-bold text-gray-100">{{ $row->destinasi->nama }}</p>
              <p class="text-sm tracking-wide text-gray-300">
              {{ $row->keterangan }}
              </p>
            </div>
          </div>
        </a>
      @empty

      @endforelse
      </div>
      <div class="text-center">
        <a href="/" aria-label="" class="inline-flex items-center font-semibold transition-colors duration-200 text-deep-purple-accent-400 hover:text-deep-purple-800">
          View gallery
          <svg class="inline-block w-3 ml-2" fill="currentColor" viewBox="0 0 12 12">
            <path d="M9.707,5.293l-5-5A1,1,0,0,0,3.293,1.707L7.586,6,3.293,10.293a1,1,0,1,0,1.414,1.414l5-5A1,1,0,0,0,9.707,5.293Z"></path>
          </svg>
        </a>
      </div>
    </div>
  </section>


  <section class="bg-gradient-to-b from-white via-white to-transparent text-gray-600 body-font">
    <div class="container px-5 py-24 mx-auto">
      <div class="flex flex-col text-center w-full mb-12">
        <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Sign up to our newsletter</h1>
        <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Ikuti berita teraru dari kami</p>
      </div>
      <div class="flex lg:w-2/3 w-full sm:flex-row flex-col mx-auto px-8 sm:space-x-4 sm:space-y-0 space-y-4 sm:px-0 items-end">
        <div class="relative flex-grow w-full">
          <label for="full-name" class="leading-7 text-sm text-gray-600">Full Name</label>
          <input type="text" id="full-name" name="full-name" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-transparent focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-2 px-3 leading-8 transition-colors duration-200 ease-in-out">
        </div>
        <div class="relative flex-grow w-full">
          <label for="email" class="leading-7 text-sm text-gray-600">Email</label>
          <input type="email" id="email" name="email" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-transparent focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-2 px-3 leading-8 transition-colors duration-200 ease-in-out">
        </div>
        <button class="text-slate-900 bg-yellow-300 border-0 py-3 px-8 focus:outline-none hover:bg-yellow-400 rounded text-base font-medium">Submit</button>
      </div>
    </div>
  </section>

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
