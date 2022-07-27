@props(['student'])
<!-- component -->
<div class="flex w-full mt-7 items-center justify-center bg-grey-lighter">
    <div class="text-center">
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
                <input type='file' class="hidden" name="file_upload" />
                <button type="submit"
                    class="bg-white text-blue-900 py-3 px-4 mt-4 uppercase font-bold rounded-md shadow-md w-full"
                    id="submit">Submit</button>
            </form>
        </label>
        <div>


        </div>
    </div>
</div>
