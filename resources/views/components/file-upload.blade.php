@props(['student'])
<!-- component -->
<div class=" w-full mt-2 items-center justify-center bg-grey-lighter p-7">
    <div class="w-1/2 mx-auto mt-10 border-blue-800 rounded-md">

        <input type="file" name="file_upload" id="file" class="font-bold">

        <form action="{{ route('students.upload', $student->studid) }}" method="POST" name="file_move">
            @csrf
            <input type="submit" value="Submit" 
                class="hover:cursor-pointer bg-white text-blue-900 py-3 px-4 mt-4 uppercase font-bold rounded-md shadow-md w-full hover:bg-blue-900 hover:text-white transition-all ease-in-out delay-75"
                id="form-submit" />
        </form>
    </div>

    {{-- <div class="text-center">
        <label
            class="w-64 flex flex-col items-center px-4 py-6 bg-white text-blue-900 rounded-lg shadow-md tracking-wide uppercase cursor-pointer hover:bg-blue-900 hover:text-white">
            <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path
                    d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
            </svg>
            <span class="mt-2 text-base leading-normal uppercase font-bold">Select a file</span>
            <form action="{{ route('students.upload', $student->studid) }}" enctype="multipart/form-data" method="post"
                id="form">
                @csrf
                <input type='file' class="hidden" name="file_upload" id="file_upload" />
            </form>
        </label>
        <img id="image" src="#" alt="Your Image" />
       
        <div>


        </div>
    </div> --}}
</div>
@section('scripts')
    <script>
        // Get a reference to the file input element
        const inputElement = document.querySelector('input[type="file"]');

        // Create a FilePond instance
        const pond = FilePond.create(inputElement);
        FilePond.setOptions({
            maxFiles:1,
            server: {
                url: "{{ route('students.temp', $student->studid) }}",
                headers: {
                    "X-CSRF-TOKEN": ' {{ csrf_token() }}'
                }

            },            

        })
    </script>
@endsection
