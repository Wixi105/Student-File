<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $student->fname }} {{ $student->mname }} {{ $student->lname }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white shadow-md">
            <div>


                <p class="text-base uppercase font-semibold">Registration Number: <span
                        class="font-medium text-lg">{{ $student->regno }}</span></p>


                <p class="text-base uppercase font-semibold">Last Name: <span class="font-medium text-lg">{{ $student->lname }}</span></p>


                <p class="text-base uppercase font-semibold">First Name: <span class="font-medium text-lg">{{ $student->fname }}</span></p>

                @if ($student->mname)
                    <p class="text-base uppercase font-semibold">Middle Name: <span
                            class="font-medium text-lg">{{ $student->mname }}</span>
                    </p>
                @endif


                <p class="text-base uppercase font-semibold">Title: <span class="font-medium text-lg">{{ $student->title }}</span></p>


                <p class="text-base uppercase font-semibold">Gender: <span class="font-medium text-lg">{{ $student->sex }}</span></p>


                <p class="text-base uppercase font-semibold">Cellphone: <span class="font-medium text-lg">{{ $student->cellphone }}</span>
                </p>


                @if ($student->email)
                    <p class="text-base uppercase font-semibold">Email: <span class="font-medium text-lg">{{ $student->email }}</span>
                    </p>
                @endif


                <p class="text-base uppercase font-semibold">Marital Status: <span
                        class="font-medium text-lg">{{ $student->marital_status }}</span></p>


                <p class="text-base uppercase font-semibold">Date of Birth: <span class="font-medium text-lg">{{ $student->dob }}</span>
                </p>


                <p class="text-base uppercase font-semibold">Date of Acceptance: <span
                        class="font-medium text-lg">{{ $student->doa }}</span></p>


                <p class="text-base uppercase font-semibold">Date of Completion: <span
                        class="font-medium text-lg">{{ $student->doc }}</span></p>


                <p class="text-base uppercase font-semibold">Programme: <span class="font-medium text-lg">{{ $student->progid }}</span>
                </p>


                <p class="text-base uppercase font-semibold">Level: <span class="font-medium text-lg">{{ $student->level }}</span></p>


                <p class="text-base uppercase font-semibold">HALL: <span class="font-medium text-lg">{{ $student->hallid }}</span></p>


                @if ($student->resident_status)
                    <p class="text-base uppercase font-semibold">Resident Status: <span
                            class="font-medium text-lg">{{ $student->resident_status }}</span></p>
                @endif


                @if ($student->room_no)
                    <p class="text-base uppercase font-semibold">Room Number: <span
                            class="font-medium text-lg">{{ $student->room_no }}</span></p>
                @endif

                @if ($student->pob_town)
                    <p class="text-base uppercase font-semibold">Place of Birth: <span
                            class="font-medium text-lg">{{ $student->pob_town }},{{ $student->pob_region }}</span></p>
                @endif


                <p class="text-base uppercase font-semibold">Nationality: <span
                        class="font-medium text-lg">{{ $student->nationality }}</span></p>


                @if ($student->hometown)
                    <p class="text-base uppercase font-semibold">Hometown: <span
                            class="font-medium text-lg">{{ $student->hometown }}</span>
                    </p>
                @endif


                <p class="text-base uppercase font-semibold">Post Box: <span class="font-medium text-lg">{{ $student->post_box }}</span>
                </p>



                @if ($student->homeadd)
                    <p class="text-base uppercase font-semibold">Home Address: <span
                            class="font-medium text-lg">{{ $student->homeadd }}</span></p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
