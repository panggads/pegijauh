<x-guest-layout>
    

  <section class="text-gray-600 body-font bg-gradient-to-b from-white via-transparent to-transparent">
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
     
    </div>
  </section>
</x-guest-layout>
