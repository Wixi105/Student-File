<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Welcome to your {{ __('Dashboard') }}, <span class="text-blue-800"> {{ Auth::user()->name }}</span>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <input type="text" class="w-full border border-blue-900 focus:border-b-900 rounded-md" placeholder="Search for a Student. (e.g. Michael Agyei or PS/ITC/17/0019)">
                </div>
                
            </div>
            <div>
                <button class="bg-blue-800 mt-4 text-white py-2 px-4 uppercase tracking-widest font-semibold rounded-md shadow-md">Search</button>
            </div>

            <div>
                <x-table></x-table>
            </div>
        </div>
    </div>

    {{-- Student List Start. --}}
    <div>

    </div>
    {{-- Student List End. --}}
</x-app-layout>
