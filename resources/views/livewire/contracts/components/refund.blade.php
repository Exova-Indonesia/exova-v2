<div>
    @if(!$refund)
            <x-jet-label for="bank" value="{{ __('Nama Bank') }}" />
            <x-simple-select-field type="text" class="mt-1 text-gray-800 block w-full"
               id="bank"
               wire:model="bank">
               <option hidden disabled selected>Pilih Bank</option>
               @foreach ($banks as $item)
               <option value="{{ $item['code'] }}">{{ $item['name'] }}</option>
               @endforeach
            </x-simple-select-field>
            <x-jet-input-error for="bank" class="mt-2" />
            {{-- Nama Pemilik --}}
            <x-jet-label for="name" value="{{ __('Nama Pemilik') }}" />
            <x-jet-input type="text" class="mt-1 text-gray-800 block w-full"
               id="name"
               wire:model="name" />
            <x-jet-input-error for="name" class="mt-2" />
            {{-- Nomor Rekening --}}
            <x-jet-label for="number" value="{{ __('Nomor Rekening') }}" />
            <x-jet-input type="text" class="mt-1 text-gray-800 block w-full"
               id="number"
               wire:model="number" />
               <x-jet-input-error for="number" class="mt-2" />
               <div class="text-right">
                <x-jet-button class="m-2"
                   wire:click="setRefund"
                   wire:loading.attr="disabled">
                   {{ __('Minta Refund') }}
                </x-jet-button>
               </div>
               @endif
            @if($refund)
              <div class="bg-white shadow px-4 md:px-10 pt-4 md:pt-7 pb-5 overflow-y-auto">
                <table class="w-full whitespace-nowrap">
                    <thead>
                        <tr tabindex="0" class="focus:outline-none h-16 w-full text-sm leading-none text-gray-800">
                            <th class="font-normal text-left pl-4">Nama</th>
                            <th class="font-normal text-left pl-12">Bank</th>
                            <th class="font-normal text-left pl-12">No. Acc</th>
                            <th class="font-normal text-left pl-20">Amount</th>
                            <th class="font-normal text-left pl-20">Status</th>
                            {{-- <th class="font-normal text-left pl-16">Action</th> --}}
                        </tr>
                    </thead>
                    <tbody class="w-full">
                        <tr tabindex="0" class="cursor-pointer focus:outline-none h-20 text-sm leading-none text-gray-800 bg-white hover:bg-gray-100 border-b border-t border-gray-100">
                            <td>
                                <p class="font-medium">{{ $refund['name'] }}</p>
                            </td>
                            <td class="pl-12">
                                <p class="text-sm font-medium leading-none text-gray-800">
                                    {{ $refund['channel'] }}
                                </p>
                            </td>
                            <td class="pl-12">
                                <p class="font-medium">
                                    {{ $refund['number'] }}
                                </p>
                            </td>
                            <td class="pl-20">
                                <p class="font-medium">{{ 'Rp' . number_format($refund['amount'], 0, ',', '.') }}</p>
                            </td>
                            <td class="pl-20">
                                @if($refund['status'] == App\Models\Refund::IS_PENDING)
                                <div class="mt-2">
                                    <span class="cursor-pointer hover:bg-yellow-200 duration-500 py-2 px-4 text-xs leading-3 text-yellow-700 rounded-full bg-yellow-100">
                                    pending
                                    </span>
                                </div>
                                @elseif($refund['status'] == App\Models\Refund::IS_SUCCESS)
                                <div class="mt-2">
                                    <span class="cursor-pointer hover:bg-green-200 duration-500 py-2 px-4 text-xs leading-3 text-green-700 rounded-full bg-green-100">
                                    success
                                    </span>
                                </div>
                                @elseif($refund['status'] == App\Models\Refund::IS_DECLINED)
                                <div class="mt-2">
                                    <span class="cursor-pointer hover:bg-red-200 duration-500 py-2 px-4 text-xs leading-3 text-red-700 rounded-full bg-red-100">
                                    declined
                                    </span>
                                </div>
                                @endif
                            </td>
                            {{-- <td class="pl-16">
                                <x-delete-button wire:click="deleteRefund({{ $refund['id'] }})" wire:loading.attr="disabled" class="h-8 w-8 bg-red-500 hover:bg-red-600 mt-1 flex items-start justify-start" />
                            </td> --}}
                        </tr>
                    </tbody>
                </table>
            </div> 
            @endif
</div>
