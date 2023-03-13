@push('styles')

@endpush

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
        $(document).ready(function() {
            $('#searchForm').on('submit', function(event) {
                event.preventDefault();
                var searchTerm = $('#searchTerm').val();

                $.ajax({
                    url: '{{ route("layanan.index") }}',
                    method: 'GET',
                    data: { searchTerm: searchTerm },
                    success: function(response) {
                        // Replace the table body with the new data
                        var tbody = $('#beritaTable tbody');
                        tbody.empty();

                        $.each(response.data.data, function(index, berita) {
                            var row = '<tr>' +
                                '<td>' + layanan.title + '</td>' +
                                '<td>' + layanan.body + '</td>' +
                                '<td>' + layanan.created_at + '</td>' +
                                '</tr>';

                            tbody.append(row);
                        });

                        // Update the pagination links
                        var pagination = $('.pagination');
                        pagination.empty();
                        pagination.html(response.data.links);
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                });
            });

            // Handle pagination links
            $(document).on('click', '.pagination a', function(event) {
                event.preventDefault();
                var url = $(this).attr('href');

                $.ajax({
                    url: url,
                    method: 'GET',
                    success: function(response) {
                        // Replace the table body with the new data
                        var tbody = $('#beritaTable tbody');
                        tbody.empty();

                        $.each(response.data.data, function(index, berita) {
                            var row = '<tr>' +
                                '<td>' + layanan.title + '</td>' +
                                '<td>' + layanan.body + '</td>' +
                                '<td>' + layanan.created_at + '</td>' +
                                '</tr>';

                            tbody.append(row);
                        });

                        // Update the pagination links
                        var pagination = $('.pagination');
                        pagination.empty();
                        pagination.html(response.data.links);

                        // Update the URL in the browser address bar
                        window.history.pushState("", "", url);
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                })
                
            });
        });
    </script>
@endpush

<x-app-layout>

    <!-- component -->
<section class="mx-auto">
    <div class="sm:flex sm:items-center sm:justify-between">
        <div>
            <div class="flex items-center gap-x-3">
                <h2 class="text-lg font-medium text-gray-800 dark:text-white">Data Layanan</h2>

                <span class="px-3 py-1 text-xs text-blue-600 bg-blue-100 rounded-full dark:bg-gray-800 dark:text-blue-400">{{ count($layanans); }} Layanan</span>
            </div>

            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">Menampilkan semua data Layanan</p>
        </div>

        <div class="mt-4 md:mt-0">
            <a href="{{ route('layanan.create') }}" class="flex items-center justify-center w-1/2 px-5 py-2 text-sm tracking-wide text-white transition-colors duration-200 bg-sky-600 rounded-lg shrink-0 sm:w-auto gap-x-2 hover:bg-blue-600 dark:hover:bg-blue-500 dark:bg-blue-600">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>Tambah Layanan</span>
            </a>
        </div>
    </div>

    
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 mt-3 text-sm rounded relative" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-2">
                <svg class="fill-current h-5 w-5 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <title>Close</title>
                    <path d="M14.348 5.652a1 1 0 0 0-1.414 0L10 8.586 7.066 5.652a1 1 0 0 0-1.414 1.414L8.586 10l-2.934 2.934a1 1 0 1 0 1.414 1.414L10 11.414l2.934 2.934a1 1 0 0 0 1.414-1.414L11.414 10l2.934-2.934a1 1 0 0 0 0-1.414z"/>
                </svg>
            </span>
        </div>
    @endif
    <div class="flex flex-col mt-6">
        <div class="overflow-x-auto">
            <div class="inline-block min-w-full py-2 align-middle">
                <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
                    <table id="beritaTable" class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 ">
                        <thead class="bg-gray-50 dark:bg-gray-800">
                            <tr>
                                <th scope="col" class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    <button class="flex items-center gap-x-3 focus:outline-none">
                                        <span>Nama</span>
                                    </button>
                                </th>

                                <th scope="col" class="relative py-3.5 px-4">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                            
                            @foreach ($layanans as $data)
                                <tr>
                                    <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                        <div>
                                            <h2 class="font-medium text-gray-800 dark:text-white ">{{ $data->nama }}</h2>
                                            <p class="text-sm font-normal text-gray-600 dark:text-gray-400">{{ $data->lokasi }}</p>
                                        </div>
                                    </td>
                                    <td class="px-4 py-4 text-sm">
                                        
                                        <button data-dropdown-toggle="dropdownDots-{{$data->id}}" class="px-1 py-1 text-gray-500 transition-colors duration-200 rounded-lg dark:text-gray-300 hover:bg-gray-100" type="button"> 
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" />
                                            </svg>
                                        </button>

                                        <!-- Dropdown menu -->
                                        <div id="dropdownDots-{{$data->id}}" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownMenuIconButton">
                                                <li>
                                
                                                    <a href="{{ route('layanan.show', $data->id) }}" class="my-auto flex px-4 py-2 hover:bg-gray-100">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                        </svg>
                                                        <span class="ml-2">View</span>
                                                    </a>
                                                </li>
     
                                                <li>
                                                    <a href="#" onclick="event.preventDefault(); if (confirm('Are you sure you want to delete this item?')) { document.getElementById('delete-form-{{$data->id}}').submit(); }" class="my-auto flex px-4 py-2 hover:bg-gray-100">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                                                          <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                        </svg>
                                                        <span class="ml-2">Delete</span>
                                                    </a>
                                                    <form id="delete-form-{{$data->id}}" action="{{ route('layanan.destroy', $data->id) }}" method="POST" style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </li>
                                            
                                            </ul>
                                            
                                        </div>
                                    
                                    </td>
                                </tr>
                                
                            @endforeach
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>

    <div class="mt-6 sm:flex sm:items-center sm:justify-between ">
        <div class="text-sm text-gray-500 dark:text-gray-400">
            {{ $layanans->links() }}
        </div>
    </div>
</section>
  
</x-app-layout>
