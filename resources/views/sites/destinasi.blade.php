<x-guest-layout>
    

  <section class="text-gray-600 body-font bg-gradient-to-b from-white via-transparent to-transparent">
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
    </div>
  </section>

</x-guest-layout>
