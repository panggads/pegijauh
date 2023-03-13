<!-- create.blade.php -->
<?php
    $input_style = 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500';
    $label_style = 'block mb-2 text-sm font-medium text-gray-900 dark:text-white';
    $main_button = 'text-white bg-gray-700 hover:bg-blugraye-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800';
?>
@push('styles')
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endpush

@push('scripts')
<script src="https://cdn.quilljs.com/1.3.6/quill.js" defer></script>
<script src="https://unpkg.com/quill-paste-smart@latest/dist/quill-paste-smart.js" defer></script>
@endpush

<x-app-layout>
    <div class="pb-4 ">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah Team') }}
        </h2>
    </div>


    <div class="block p-6 rounded-lg shadow-lg bg-white">
        <!--div class="card-header">Tambah Team</div-->
        <div class="card-body">

            <form method="POST" action="{{ route('team.store') }}">
                @csrf
                
                <div class="mb-6">
                    <label for="nama" class="{{ $label_style }}">Nama</label>
                    <input name="nama" type="text" id="nama" class="{{ $input_style }}" placeholder="Tulis nama" required>
                    @error('nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="posisi" class="{{ $label_style }}">Posisi</label>
                    <input name="posisi" type="text" id="posisi" class="{{ $input_style }}" placeholder="Posisi (ex. Team leader etc)" required>
                    @error('posisi')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <div class="mb-6">
                    <label for="keterangan" class="{{ $label_style }}">Caption</label>
                    <input name="keterangan" type="text" id="keterangan" class="{{ $input_style }}" placeholder="Tulis caption">
                    @error('keterangan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="ig" class="{{ $label_style }}">Instagram</label>
                    <input name="ig" type="text" id="ig" class="{{ $input_style }}" placeholder="Url Instagram">
                    @error('ig')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="twitter" class="{{ $label_style }}">Twitter</label>
                    <input name="twitter" type="text" id="twitter" class="{{ $input_style }}" placeholder="Url Twitter">
                    @error('twitter')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="wa" class="{{ $label_style }}">Whatsapp</label>
                    <input name="wa" type="text" id="wa" class="{{ $input_style }}" placeholder="Tulis nomor WA">
                    @error('wa')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <!--div class="mb-6">
                    <label for="Narasi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Narasi</label>
                    <x-quill-editor 
                        label="" 
                        name="isi" 
                        value="" 
                        endpoint="/uploads"
                        placeholder="Content here..." />
                </div-->
                
                <button type="submit" class="{{ $main_button }}">Save</button>
            </form>
        </div>
    </div>
    
</x-app-layout>