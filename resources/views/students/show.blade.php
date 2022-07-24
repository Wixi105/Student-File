<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $student->fname }} {{ $student->mname }} {{ $student->lname }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white shadow-md">

            <div class="bg-white p-3 shadow-sm rounded-sm">
                <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                    <span clas="text-green-500">
                        <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </span>
                    <span class="tracking-wide">About</span>
                </div>
                <div class="text-gray-700">
                    <div class="grid md:grid-cols-2 text-sm">
                        <div class="grid grid-cols-2">
                            <div class="px-4 py-2 font-semibold">Registration Number:</div>
                            <div class="px-4 py-2">{{ $student->regno }}</div>
                        </div>
                        <div class="grid grid-cols-2">
                            <div class="px-4 py-2 font-semibold">First Name</div>
                            <div class="px-4 py-2">{{ $student->fname }}</div>
                        </div>
                        @if ($student->mname)
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Middle Name</div>
                                <div class="px-4 py-2">{{ $student->mname }}</div>
                            </div>
                        @endif
                        <div class="grid grid-cols-2">
                            <div class="px-4 py-2 font-semibold">Last Name</div>
                            <div class="px-4 py-2">{{ $student->lname }}</div>
                        </div>
                        <div class="grid grid-cols-2">
                            <div class="px-4 py-2 font-semibold">Gender</div>
                            <div class="px-4 py-2">{{ $student->sex }}</div>
                        </div>
                        <div class="grid grid-cols-2">
                            <div class="px-4 py-2 font-semibold">Contact No.</div>
                            <div class="px-4 py-2">{{ $student->cellphone }}</div>
                        </div>
                        <div class="grid grid-cols-2">
                            <div class="px-4 py-2 font-semibold">Current Address</div>
                            <div class="px-4 py-2">{{ $student->homeadd }}</div>
                        </div>
                        <div class="grid grid-cols-2">
                            <div class="px-4 py-2 font-semibold">Permanant Address</div>
                            <div class="px-4 py-2">{{ $student->homeadd }}
                            </div>
                            @if ($student->email)
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Email.</div>
                                    <div class="px-4 py-2">
                                        <a class="text-blue-800"
                                            href="mailto:jane@example.com">{{ $student->email }}</a>
                                    </div>
                                </div>
                            @endif
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Birthday</div>
                                <div class="px-4 py-2">{{ $student->dob }}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Title</div>
                                <div class="px-4 py-2">{{ $student->title }}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Marital Status</div>
                                <div class="px-4 py-2">{{ $student->marital_status }}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Date of Acceptance</div>
                                <div class="px-4 py-2">{{ $student->doa }}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Date of Completion</div>
                                <div class="px-4 py-2">{{ $student->doc }}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Programme</div>
                                <div class="px-4 py-2">{{ $student->progid }}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Hall</div>
                                <div class="px-4 py-2">{{ $student->hallid }}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Nationality</div>
                                <div class="px-4 py-2">{{ $student->nationality }}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Post Office Box</div>
                                <div class="px-4 py-2">{{ $student->post_box }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="my-4"></div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
</x-app-layout>
