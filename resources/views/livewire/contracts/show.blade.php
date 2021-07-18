<div>
    <x-app-layout>
        <x-slot name="header">
         <div class="flex justify-between">
            <div>
               <a href="{{ url('/') }}">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                  </svg>
               </a>
            </div>
            <div>
               <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                  @lang('navigation.menu.contract')
               </h2>
            </div>
         </div>
      </x-slot>
        <div class="w-full sm:px-6 py-12">
            <div class="bg-white shadow px-4 md:px-10 pt-4 md:pt-7 pb-5 overflow-y-auto">
                <table class="w-full whitespace-nowrap">
                    <thead>
                        <tr tabindex="0" class="focus:outline-none h-16 w-full text-sm leading-none text-gray-800">
                            <th class="font-normal text-left pl-4">Project</th>
                            <th class="font-normal text-left pl-12">Status</th>
                            <th class="font-normal text-left pl-12">Ketemu Seller</th>
                            <th class="font-normal text-left pl-20">Price</th>
                            <th class="font-normal text-left pl-20">Deadline</th>
                            <th class="font-normal text-left pl-16">Seller</th>
                        </tr>
                    </thead>
                    <tbody class="w-full">
                        @forelse ($data as $item)
                        <tr wire:click="choose('{{ $item['uuid'] }}')" tabindex="0" class="cursor-pointer focus:outline-none h-20 text-sm leading-none text-gray-800 bg-white hover:bg-gray-100 border-b border-t border-gray-100">
                            <td>
                                <div class="flex items-center">
                                    <div class="pl-4">
                                        <p class="font-medium">{{ $item['requests']['title'] }}</p>
                                        <p class="text-xs leading-3 text-gray-600 pt-2">{{ $item['requests']['description'] }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="pl-12">
                                <p class="text-sm font-medium leading-none text-gray-800">
                                @switch($item['status'])
                            @case(0)
                                <span class="py-2 px-4 text-xs leading-3 text-yellow-700 rounded-full bg-yellow-100">
                                    Waiting Payment
                                </span>
                                @break
                            @case(1)
                                <span class="py-2 px-4 text-xs leading-3 text-green-700 rounded-full bg-green-100">
                                    Contract Started
                                </span>
                                @break
                            @case(2)
                                <span class="py-2 px-4 text-xs leading-3 text-blue-700 rounded-full bg-blue-100">
                                    Request Approvement
                                </span>
                                @break
                            @case(3)
                                <span class="py-2 px-4 text-xs leading-3 text-yellow-700 rounded-full bg-yellow-100">
                                    Project Returned
                                </span>
                                @break
                            @case(4)
                                <span class="py-2 px-4 text-xs leading-3 text-green-700 rounded-full bg-green-100">
                                    Project Approved
                                </span>
                                @break
                            @case(5)
                                <span class="py-2 px-4 text-xs leading-3 text-green-700 rounded-full bg-green-100">
                                    Contract End
                                </span>
                                @break
                            @case(6)
                                <span class="py-2 px-4 text-xs leading-3 text-red-700 rounded-full bg-red-100">
                                    Contract Canceled
                                </span>
                                @break
                            @default
                                
                        @endswitch
                                </p>
                            </td>
                            <td class="pl-12">
                                <p class="font-medium">
                                    @if($item['requests']['is_meet_seller'])
                                    <div class="mt-2">
                                        <span class="cursor-pointer hover:bg-green-200 duration-500 py-2 px-4 text-xs leading-3 text-green-700 rounded-full bg-green-100">
                                        Ya
                                        </span>
                                    </div>
                                    @else
                                    <div class="mt-2">
                                        <span class="cursor-pointer hover:bg-red-200 duration-500 py-2 px-4 text-xs leading-3 text-red-700 rounded-full bg-red-100">
                                        Tidak
                                        </span>
                                    </div>
                                    @endif
                                </p>
                            </td>
                            <td class="pl-20">
                                <p class="font-medium">{{ 'Rp' . number_format($item['deal_price'], 0, ',', '.') }}</p>
                            </td>
                            <td class="pl-20">
                                <p class="font-medium">{{ $item['requests']['due_at']->format('F j, Y h:i a') }}</p>
                            </td>
                            <td class="pl-16">
                                <div class="flex items-center">
                                    <img class="shadow-md w-8 h-8 rounded-full" src="{{ $item['seller']['profile_photo_url'] }}" alt="collaborator 1" />
                                </div>
                            </td>
                        </tr>
                        @empty
                        <div class="">
                             
                        </div>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </x-app-layout>
</div>
    