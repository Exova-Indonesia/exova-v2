<div>
                <div class="mx-auto container bg-white dark:bg-gray-800 dark:bg-gray-800 shadow rounded">
                    <div class="flex flex-col lg:flex-row p-4 lg:p-8 justify-end items-start lg:items-stretch w-full">
                        <div class="w-full flex flex-col lg:flex-row items-start lg:items-center justify-between">
                            <div class="flex items-center lg:border-l lg:border-r border-gray-300 py-3 lg:py-0 lg:px-6">
                                <p class="text-base text-gray-600 dark:text-gray-400" id="page-view">Viewing 1 - 20 of 60</p>
                                <button class="text-gray-600 dark:text-gray-400 ml-2 border-transparent border cursor-pointer rounded focus:outline-none focus:ring-2 focus:ring-gray-500 " onclick="pageView(false)" aria-label="Goto previous page " role="button">
                                    <svg  xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-left" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" />
                                        <polyline points="15 6 9 12 15 18" />
                                    </svg>
                                </button>
                                <button class="text-gray-600 dark:text-gray-400 border-transparent border rounded focus:outline-none focus:ring-2 focus:ring-gray-500 cursor-pointer" aria-label="goto next page" role="button" onclick="pageView(true)">
                                    <svg  xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-right" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" />
                                        <polyline points="9 6 15 12 9 18" />
                                    </svg>
                                </button>
                            </div>

                            <div class="lg:ml-6 flex items-center">
                                <x-jet-button class="ml-2 bg-blue-500 hover:bg-blue-600 focus:border-blue-300 active:bg-blue-900" wire:loading.attr="disabled">
                                    {{ __('Download') }}
                                </x-jet-button>
                            </div>
                        </div>
                    </div>
                    <div class="w-full overflow-x-scroll xl:overflow-x-hidden">
<table class="min-w-full bg-white dark:bg-gray-800">
                            <thead>
                                <tr class="w-full h-16 border-gray-300 border-b py-8">
                                    <th role="columnheader" class="pl-8 text-gray-600 dark:text-gray-400 font-normal pr-6 text-left text-sm tracking-normal leading-4">Invoice Number</th>
                                    <th role="columnheader" class="text-gray-600 dark:text-gray-400 font-normal pr-6 text-left text-sm tracking-normal leading-4">Client</th>
                                    <th role="columnheader" class="text-gray-600 dark:text-gray-400 font-normal pr-6 text-left text-sm tracking-normal leading-4">Company Contact</th>
                                    <th role="columnheader" class="text-gray-600 dark:text-gray-400 font-normal pr-6 text-left text-sm tracking-normal leading-4">Amount</th>
                                    <th role="columnheader" class="text-gray-600 dark:text-gray-400 font-normal pr-6 text-left text-sm tracking-normal leading-4">Cum Date</th>
                                    <th role="columnheader" class="text-gray-600 dark:text-gray-400 font-normal pr-6 text-left text-sm tracking-normal leading-4"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="h-24 border-gray-300 border-b">
                                    <td class="pl-8 text-sm pr-6 whitespace-no-wrap text-gray-800 dark:text-gray-100 tracking-normal leading-4">#MC10023</td>
                                    <td class="pr-6 whitespace-no-wrap">
                                        <div class="flex items-center">
                                            <div class="h-8 w-8">
                                                <img src="https://tuk-cdn.s3.amazonaws.com/assets/components/advance_tables/at_1.png" alt="Display Avatar of Carrie Anthony" role="img" class="h-full w-full rounded-full overflow-hidden shadow" />
                                            </div>
                                            <p class="ml-2 text-gray-800 dark:text-gray-100 tracking-normal leading-4 text-sm">Carrie Anthony</p>
                                        </div>
                                    </td>
                                    <td class="text-sm pr-6 whitespace-no-wrap text-gray-800 dark:text-gray-100 tracking-normal leading-4">Toyota Motors</td>
                                    <td class="text-sm pr-6 whitespace-no-wrap text-gray-800 dark:text-gray-100 tracking-normal leading-4">$2,500</td>
                                    <td class="text-sm pr-6 whitespace-no-wrap text-gray-800 dark:text-gray-100 tracking-normal leading-4">02.03.20</td>
                                    <td class="cursor-pointer text-sm pr-6 whitespace-no-wrap text-gray-800 dark:text-gray-100 tracking-normal leading-4">
                                        <span class="p-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 transform hover:scale-110 duration-500 ease-in-out">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
</svg>
                </span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
</div>
