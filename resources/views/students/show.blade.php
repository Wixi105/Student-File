<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold uppercase text-xl text-blue-900 leading-tight">
            {{ $student->fname }} {{ $student->mname }} {{ $student->lname }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white shadow-md rounded-lg">

            <div class="bg-white p-7 shadow-sm rounded-sm">
                <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                    <span clas="text-green-500">
                        <svg class="h-5 text-blue-900" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </span>
                    <span class="tracking-wide uppercase text-blue-900 font-bold">About</span>
                </div>
                <div class="text-gray-700 ">
                    <div class="grid md:grid-cols-2 ">
                        <div class="grid grid-cols-2">
                            <div class="px-4 py-2 font-semibold uppercase">Registration Number:</div>
                            <div class="px-4 py-2">{{ $student->regno }}</div>
                        </div>

                        <div class="grid grid-cols-2">
                            <div class="px-4 py-2 font-semibold uppercase">Gender</div>
                            <div class="px-4 py-2">{{ $student->sex }}</div>
                        </div>
                    </div>
                    <div class="grid md:grid-cols-2 ">
                        <div class="grid grid-cols-2">
                            <div class="px-4 py-2 font-semibold uppercase">Contact No.</div>
                            <div class="px-4 py-2">{{ $student->cellphone }}</div>
                        </div>
                        <div class="grid grid-cols-2">
                            <div class="px-4 py-2 font-semibold uppercase">Current Address</div>
                            <div class="px-4 py-2">{{ $student->homeadd }}</div>
                        </div>
                    </div>
                    <div class="grid md:grid-cols-2 ">
                        <div class="grid grid-cols-2">
                            <div class="px-4 py-2 font-semibold uppercase">Permanent Address</div>
                            <div class="px-4 py-2">{{ $student->homeadd }}
                            </div>
                        </div>
                        @if ($student->email)
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold uppercase">Email.</div>
                                <div class="px-4 py-2">
                                    <a class="text-blue-800" href="mailto:jane@example.com">{{ $student->email }}</a>
                                </div>
                            </div>
                        @endif
                        <div class="grid grid-cols-2">
                            <div class="px-4 py-2 font-semibold uppercase">Birthday</div>
                            <div class="px-4 py-2">{{ $student->dob }}</div>
                        </div>
                        <div class="grid grid-cols-2">
                            <div class="px-4 py-2 font-semibold uppercase">Title</div>
                            <div class="px-4 py-2">{{ $student->title }}</div>
                        </div>
                        <div class="grid grid-cols-2">
                            <div class="px-4 py-2 font-semibold uppercase">Marital Status</div>
                            <div class="px-4 py-2">{{ $student->marital_status }}</div>
                        </div>
                        <div class="grid grid-cols-2">
                            <div class="px-4 py-2 font-semibold uppercase">Date of Acceptance</div>
                            <div class="px-4 py-2">{{ $student->doa }}</div>
                        </div>
                        <div class="grid grid-cols-2">
                            <div class="px-4 py-2 font-semibold uppercase">Date of Completion</div>
                            <div class="px-4 py-2">{{ $student->doc }}</div>
                        </div>
                        <div class="grid grid-cols-2">
                            <div class="px-4 py-2 font-semibold uppercase">Programme</div>
                            <div class="px-4 py-2">{{ $student->progid }}</div>
                        </div>
                        <div class="grid grid-cols-2">
                            <div class="px-4 py-2 font-semibold uppercase">Hall</div>
                            <div class="px-4 py-2">{{ $student->hallid }}</div>
                        </div>
                        <div class="grid grid-cols-2">
                            <div class="px-4 py-2 font-semibold uppercase">Nationality</div>
                            <div class="px-4 py-2">{{ $student->nationality }}</div>
                        </div>
                        <div class="grid grid-cols-2">
                            <div class="px-4 py-2 font-semibold uppercase">Post Office Box</div>
                            <div class="px-4 py-2">{{ $student->post_box }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="my-4"></div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 shadow-sm rounded-md">
            @if ($message = session('message'))
                <div class="mx-6 bg-green-100 rounded-lg py-5 px-6 text-base text-green-700 mb-3 font-bold"
                    role="alert">
                    {{ $message }}
                </div>
            @endif
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white shadow-md rounded-lg p-5 mt-16">
            <h3 class="uppercase mb-5 text-blue-900 font-semibold">Uploaded files for Student</h3>
            <div>
                @if ($files->count())

                    @foreach ($files as $file)
                        <div class="flex items-center justify-between py-3">
                            <a class="text-lg" href="{{ asset("storage/uploads/{$student->studid}/{$file->filename}") }}"
                                target="__blank">{{ $file->filename_actual }}</a>
                            <div class="flex items-center">
                                <svg class="w-5 h-5 mr-3 text-blue-900 cursor-pointer " fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                    </path>
                                </svg>
                                {{-- VIEW EYE END --}}
                                {{-- DOWNLOAD START --}}
                                <svg class="w-5 h-5 mr-3 text-green-600 cursor-pointer" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                                </svg>
                                {{-- DELETE START --}}
                                <svg class="w-5 h-5 text-red-700 cursor-pointer" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                @else
                <p class="text-lg">No files have been uploaded for this student.</p>
                @endif

            </div>
        </div>


        {{-- File Upload Form --}}
        <div>
            <x-file-upload :student="$student" />
        </div>
        {{-- File Upload Form --}}

    </div>
</x-app-layout>
