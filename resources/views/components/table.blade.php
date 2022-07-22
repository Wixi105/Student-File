@props(['student'])
<!-- component -->
<!-- This is an example component -->
<div class="w-full mt-24 mx-auto">

    <div class="flex flex-col">
        <div class="overflow-x-auto shadow-md sm:rounded-lg">
            <div class="inline-block min-w-full align-middle">
                <div class="overflow-hidden ">
                    <table class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-700">
                        <thead class="bg-white ">
                            <tr>

                                <th scope="col"
                                    class="py-3 px-6 text-sm font-medium tracking-wider text-left text-gray-700 uppercase ">
                                    Student ID
                                </th>
                                <th scope="col"
                                    class="py-3 px-6 text-sm font-medium tracking-wider text-left text-gray-700 uppercase">
                                    First Name
                                </th>
                                <th scope="col"
                                    class="py-3 px-6 text-sm font-medium tracking-wider text-left text-gray-700 uppercase">
                                    Last Name
                                </th>
                                <th scope="col" class="p-4">
                                    <span class="sr-only">View</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-gray-600 divide-y divide-gray-200 dark:divide-gray-700">
                            <tr class="hover:bg-gray-700">

                                <td
                                    class="py-4 px-6 text-lg font-medium text-gray-100  whitespace-nowrap tracking-wider">
                                    PS/ITC/17/0019</td>
                                <td
                                    class="py-4 px-6 text-lg font-medium text-gray-100 whitespace-nowrap tracking-wider">
                                    Michael</td>
                                <td
                                    class="py-4 px-6 text-lg font-medium text-gray-100  whitespace-nowrap tracking-wider">
                                    Scott</td>
                                <td class="py-4 px-6 text-md text-right whitespace-nowrap ">
                                    <a href="#"
                                        class="text-gray-100 font-bold hover:underline uppercase tracking-widest border-2 hover:bg-white hover:text-gray-800 hover:shadow-md border-gray-200 px-3 py-2 rounded-md no-underline hover:no-underline">View</a>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
