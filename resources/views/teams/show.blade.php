<?php
    $input_style = 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500';
    $label_style = 'block mb-2 text-sm font-medium text-gray-900 dark:text-white';
    $main_button = 'text-white bg-gray-700 hover:bg-blugraye-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800';
    $coverUrl = $team->foto ? asset('storage/img/team/' . $team->foto) : null;
    

?>

@push('styles')
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endpush

@push('scripts')
<script src="https://cdn.quilljs.com/1.3.6/quill.js" defer></script>
<script src="https://unpkg.com/quill-paste-smart@latest/dist/quill-paste-smart.js" defer></script>
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script>
    // handle file input change event to compress the selected image before sending the AJAX request
$(document).on('change', '#image', function() {
    var file = $(this).get(0).files[0];
    if (file) {
        var reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onloadend = function() {
            var img = new Image();
            img.src = reader.result;
            img.onload = function() {
                var canvas = document.createElement('canvas');
                var ctx = canvas.getContext('2d');
                canvas.width = 500; // set the maximum width of the compressed image
                canvas.height = canvas.width * img.height / img.width;
                ctx.drawImage(img, 0, 0, canvas.width, canvas.height);
                var dataURL = canvas.toDataURL('image/jpeg', 0.8); // set the compression quality to 80%
                $('#image').attr('value', dataURL);
            };
        };
    }
});

// handle form submit event to upload the compressed image with AJAX
$(document).on('submit', '#image-upload-form', function(event) {
    event.preventDefault();
    // disable the submit button and show the loading spinner
    $('#image-upload-btn').prop('disabled', true);
    $('#loading-spinner').removeClass('hidden');
    var formData = new FormData(this);
    $.ajax({
        url: "upload",
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
            // enable the submit button and hide the loading spinner
            $('#image-upload-btn').prop('disabled', false);
            $('#loading-spinner').addClass('hidden');
            // handle the success response
            $('#image-cover').attr('src', '/'+response.url);
            console.log(response.url);
        },
        error: function(xhr, status, error) {
            // enable the submit button and hide the loading spinner
            $('#image-upload-btn').prop('disabled', false);
            $('#loading-spinner').addClass('hidden');
            // handle the error response
            console.log(xhr.responseText);
        }
    });
});

</script>

@endpush

<x-app-layout>

    <!-- component -->
<section class="mx-auto">
    
    <section class="text-gray-600 body-font mt-6">
        <div class="mx-auto flex flex-col md:flex-row">

            <div class=" basis-6/12 md:mr-4 bg-white px-6 py-8">
                <h1 class="mb-6 font-bold">Edit Destinasi</h1>
                
                <div class="mt-0">
                    <div class="mt-0">
     
                    <form id="image-upload-form" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm mb-2" for="image">
                                Pilih gambar untuk dijadikan cover
                            </label>
                            <input class="appearance-none  w-full py-2 px-3 text-gray-700 leading-tight" id="image" type="file" name="image">
                        </div>
                        <div class="mb-4 flex">
                            <input type="hidden" name="id" value="{{ $team->id }}">
                            <button id="image-upload-btn" class="bg-sky-500 hover:bg-sky-700 text-white font-semibold py-1 px-2 rounded text-sm" type="submit">
                                Upload Image
                            </button>
                            <div role="status" id="loading-spinner" class="ml-4 hidden">
                                <svg aria-hidden="true" class="inline w-4 h-4 mr-2 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                                    <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                                </svg>
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>
                        
                    </form>
                    
                    

                    </div>


                    <div class=" mt-4 pt-4 sm:mt-0 text-left">
                        <form method="POST" action="{{ route('team.update', $team->id) }}">
                            @csrf
                            @method('PUT')
                            
                            <div class="mb-6">
                                <label for="nama" class="{{ $label_style }}">Nama Destinasi</label>
                                <input name="nama" type="text" id="nama" class="{{ $input_style }}" placeholder="Tulis nama destinasi" value="{{ $team->nama }}" required>
                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-6">
                                <label for="posisi" class="{{ $label_style }}">Posisi</label>
                                <input value="{{ $team->posisi }}" name="posisi" type="text" id="posisi" class="{{ $input_style }}" placeholder="Posisi (ex. Team leader etc)" required>
                                @error('posisi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <div class="mb-6">
                                <label for="keterangan" class="{{ $label_style }}">Caption</label>
                                <input value="{{ $team->keterangan }}" name="keterangan" type="text" id="keterangan" class="{{ $input_style }}" placeholder="Tulis caption">
                                @error('keterangan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-6">
                                <label for="ig" class="{{ $label_style }}">Instagram</label>
                                <input value="{{ $team->ig }}" name="ig" type="text" id="ig" class="{{ $input_style }}" placeholder="Url Instagram">
                                @error('ig')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-6">
                                <label for="twitter" class="{{ $label_style }}">Twitter</label>
                                <input value="{{ $team->twitter }}" name="twitter" type="text" id="twitter" class="{{ $input_style }}" placeholder="Url Twitter">
                                @error('twitter')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-6">
                                <label for="wa" class="{{ $label_style }}">Whatsapp</label>
                                <input value="{{ $team->wa }}" name="wa" type="text" id="wa" class="{{ $input_style }}" placeholder="Tulis nomor WA">
                                @error('wa')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            

                            <button type="submit" class="{{ $main_button }}">Simpan Perubahan</button>
                        </form>    

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

                    </div>
                </div>
            </div>

            <div class="basis-6/12 md:ml-4 my-12 md:my-0 bg-white px-6 py-8">
                <h1 class="mb-6 font-bold">Preview Team</h1>
                <div class="">
                    <div class="h-full flex flex-col items-center text-center">
                        
                        @if ($coverUrl)
                            <img src="{{ $coverUrl }}" class="flex-shrink-0 rounded-t-lg border-b-4 border-yellow-300 w-full object-cover object-center mb-4" alt="Cover Image" id="image-cover">
                        @else
                            <img id="image-cover" alt="content" class="object-cover object-center h-full w-full" src="https://dummyimage.com/1200x500">
                        @endif
                        <div class="w-full">
                        <h2 class="title-font font-medium text-lg text-gray-900">{{ $team->nama }}</h2>
                        <h3 class="text-gray-500 mb-3">{{ $team->posisi }}</h3>
                        <p class="mb-4">{{ $team->keterangan }}</p>
                        <span class="inline-flex">
                        @if ($team->ig != null)
                            <a href="{{ $team->ig }}" target="_blank" class="text-gray-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                            </a>
                        @endif

                        @if ($team->twitter != null)
                            <a href="{{ $team->ig }}" target="_blank" class="ml-2 text-gray-500">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                    <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path>
                                </svg>
                            </a>
                        @endif
                        
                        @if ($team->wa != null)
                            <a href="https://wa.me/{{ $team->wa }}" target="_blank" class="ml-2 text-gray-500">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                    <path d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z"></path>
                                </svg>
                            </a>
                        @endif

                        </span>
                        </div>
                    </div>
                    </div>
            </div>

        </div>
    </section>
</section>
  
</x-app-layout>
