<?php
    $input_style = 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500';
    $label_style = 'block mb-2 text-sm font-medium text-gray-900 dark:text-white';
    $main_button = 'text-white bg-gray-700 hover:bg-blugraye-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800';
?>

@push('styles')

@endpush

@push('scripts')

@endpush

<x-app-layout>

    <!-- component -->
<section class="mx-auto">
    
    <section class="text-gray-600 body-font mt-6">
        <div class="mx-auto flex flex-col md:flex-row">

            <div class=" basis-3/12 md:mr-4 bg-white px-6 py-8">
                <div class="pb-5 border-b-2 border-slate-200">
                    <h1 class="mb-6 font-bold">Tambahkan Foto</h1>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('galeri.store') }}" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="mb-6">
                             <input type="hidden" name="id_destinasi" value="{{ $model->id }}">   
                            <input class="appearance-none  w-full py-2 px-3 text-gray-700 leading-tight" id="foto" type="file" name="foto">
                            @error('foto')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="mb-6">
                            <label for="keterangan" class="{{ $label_style }}">Caption</label>
                            <input name="keterangan" type="text" id="keterangan" class="{{ $input_style }}" placeholder="Tulis caption (ex. Experience the wonder of Papuma)" required>
                            @error('keterangan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <button type="submit" class="{{ $main_button }}">Save</button>
                    </form>
                </div>
                <div class="mt-5">
                    <h1 class="mb-6 font-bold">Preview Destinasi</h1>
                    <div class="sm:mb-0 mb-6 ">
                        <div class="bg-slate-50 rounded-lg">
                            <div class="rounded-lg h-64 overflow-hidden">
                            <img alt="content" class="object-cover object-center h-full w-full" src="{{ asset('storage/img/destinasi/'.$model->cover) }}">
                            </div>
                            <div class="p-4 -mt-3">
                            <h2 class="text-xl font-medium title-font text-gray-900 mt-5">{{ $model->nama }}</h2>
                            <p class="text-base leading-relaxed mt-2">{{ $model->keterangan }}</p>
                            <a class="text-indigo-500 inline-flex items-center mt-3">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-2" >
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                </svg>
                                
                                {{ $model->lokasi }}
                            </a>
                            </div>
                        </div> 
                    </div>
                </div>
                
            </div>

            <div class="basis-9/12 md:ml-4 my-12 md:my-0 bg-white px-6 py-8">
                <h1 class="mb-6 font-bold">Galeri</h1>
                <div class="flex flex-wrap">
                @foreach ($model->galeri as $data)
                    <div class="lg:w-1/3 sm:w-1/2 p-4">
                        <div class="flex relative">
                            <img alt="gallery" class="absolute inset-0 w-full h-full object-cover object-center" src="{{ asset('storage/img/galeri/'.$data->foto) }}">
                            <div class="px-8 py-10 relative z-10 w-full border-4 border-gray-200 bg-white opacity-0 hover:opacity-100">
                                <h2 class="tracking-widest text-sm title-font font-medium text-indigo-500 mb-1">{{ $model->nama }}</h2>
                                <p class="leading-relaxed">{{ $data->keterangan }}</p>
                                <div class="flex mt-3 gap-3">
                                    <button class="px-3 py-1 bg-slate-100 text-sm rounded-md">Edit Caption</button>
                                    <button class="px-3 py-1 bg-slate-100 text-sm rounded-md">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>

        </div>
    </section>
</section>
  
</x-app-layout>
