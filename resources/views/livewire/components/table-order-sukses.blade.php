<div>
<div>
<div class="w-full">
            <div class="px-4 md:px-10 py-4 md:py-7 bg-gray-100 rounded-tl-lg rounded-tr-lg">
                <div class="sm:flex items-center justify-between">
                    <p tabindex="0" class="focus:outline-none text-base sm:text-lg md:text-xl lg:text-2xl font-bold leading-normal text-gray-800">Order Sukses</p>
                    <div>
                        <x-jet-button class="ml-2 bg-red-500 hover:bg-red-600 focus:border-red-600 active:bg-red-900" wire:loading.attr="disabled">
                            {{ __('Lihat Semua') }}
                        </x-jet-button>
                    </div>
                </div>
            </div>
            <div class="bg-white shadow px-4 md:px-10 pt-4 md:pt-7 pb-5 overflow-y-auto">
                <table class="w-full whitespace-nowrap">
                    <thead>
                        <tr tabindex="0" class="focus:outline-none h-16 w-full text-sm leading-none text-gray-800">
                            <th class="font-normal text-left pl-4">Project</th>
                            <th class="font-normal text-left pl-12">Last Submited</th>
                            <th class="font-normal text-left pl-20">Feedback</th>
                            <th class="font-normal text-left pl-20">Finish At</th>
                            <th class="font-normal text-left pl-20">Client</th>
                        </tr>
                    </thead>
                    <tbody class="w-full">
                        <tr tabindex="0" class="focus:outline-none h-20 text-sm leading-none text-gray-800 bg-white hover:bg-gray-100 border-b border-t border-gray-100">
                            <td class="pl-4 cursor-pointer">
                                <div class="flex items-center">
                                    <div class="w-10 h-10">
                                        <img class="w-full h-full" src="https://cdn.tuk.dev/assets/templates/olympus/projects.png" alt="UX Design and Visual Strategy" />
                                    </div>
                                    <div class="pl-4">
                                        <p class="font-medium">UX Design &amp; Visual Strategy</p>
                                        <p class="text-xs leading-3 text-gray-600 pt-2">Herman Group</p>
                                    </div>
                                </div>
                            </td>
                            <td class="pl-12 cursor-pointer text-center">
<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500 m-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
</svg>
                            </td>
                            <td class="pl-20">
                                <p class="font-medium">22.12.21</p>

                            </td>
                            <td class="pl-20">
                                <p class="font-medium">
                                    22 Jun 21
                                </p>

                            </td>
                            <td class="pl-20">
                                    <div class="w-10 h-10">
                                        <img class="w-full h-full rounded-full" src="https://cdn.tuk.dev/assets/templates/olympus/projects.png" alt="UX Design and Visual Strategy" />
                                    </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
</div>

</div>
