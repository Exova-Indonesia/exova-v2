<div>
   <div class="sm:flex items-center my-2 justify-between">
      <p tabindex="0" class="focus:outline-none text-base mx-2 sm:text-lg md:text-md lg:text-lg font-bold leading-normal text-gray-800">Akun Bank</p>
      <div>
         @if(empty($data['banks']))
         <x-jet-button wire:click="$toggle('isOpen')" class="ml-2 bg-purple-500 hover:bg-purple-600 focus:border-purple-600 active:bg-purple-900" wire:loading.attr="disabled">
            {{ __('Tambah Bank') }}
         </x-jet-button>
         @else 
         <x-jet-button wire:click="$toggle('isOpenWd')" class="ml-2 bg-purple-500 hover:bg-purple-600 focus:border-purple-600 active:bg-purple-900" wire:loading.attr="disabled">
            {{ __('Tarik') }}
         </x-jet-button>
         @endif
      </div>
   </div>
   <div class="flex items-center w-full">
      <div class="flex flex-col w-full p-2 items-start max-h-96 bg-white shadow rounded-lg">
         @if(! empty($data['banks']))
         <section class="flex w-full h-72">
            <div class="flex w-full justify-between">
               <div class="relative w-full rounded-2xl shadow-lg overflow-hidden">
                  <div class="flex flex-col">
                     <header class="flex justify-between p-4 text-white z-10">
                        <span class="h-16 w-16">
                           <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                 d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z" />
                           </svg>
                        </span>
                        <span class="h-8 w-8">
                           <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                 d="M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071c3.904-3.905 10.236-3.905 14.141 0M1.394 9.393c5.857-5.857 15.355-5.857 21.213 0" />
                           </svg>
                        </span>
                     </header>
                     <div class="flex justify-between px-4 text-gray-100 z-10 mb-4">
                        <div class="flex flex-col items-start">
                           <span class="font-thin">Name</span>
                           <span class="tracking-widest text-xl">{{ $data['banks']['name'] }}</span>
                        </div>
                        <div class="flex flex-col items-end">
                           <span class="font-thin">Number Acc.</span>
                           <span class="tracking-widest text-xl">**** **** {{ substr($data['banks']['number'], -4) }}</span>
                        </div>
                     </div>
                     <div class="flex items-center justify-between px-4 h-16 z-10 text-white bg-indigo-900">
                        <div class="flex flex-col items-start cursor-pointer" wire:click="$toggle('isOpen')">
                           <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                           </svg>
                        </div>
                        <div class="flex flex-col items-center">
                           <div>{{ $data['banks']['channel'] }}</div>
                        </div>
                     </div>
                     <div
                        class="absolute opacity-90 top-0 left-0 h-full blur w-full bg-gradient-to-t from-blue-700 to-indigo-400 rounded-2xl">
                     </div>
                  </div>
               </div>
            </div>
         </section>
         @else 
         <div class="m-auto flex flex-col">
            <div>
               <img src="{{ asset('/icons/bank.svg') }}" alt="">
            </div>
            <div>
               <p class="py-2 text-center">Tambahkan akun bank untuk melakukan penarikan</p>
            </div>
         </div>
         @endif
      </div>
   </div>
   <!-- Add Bank Confirmation Modal -->
   <x-jet-dialog-modal wire:model="isOpen">
      <x-slot name="title">
         {{ __('Tambah Akun Bank') }}
      </x-slot>
      <x-slot name="content">
         {{ __('Sebelum melakukan penarikan, kamu harus melengkapi akun bank kamu terlebih dahulu') }}
         <div class="mt-4">
            {{-- Bank --}}
            <x-jet-label for="bank" value="{{ __('Nama Bank') }}" />
            <x-simple-select-field type="text" class="mt-1 block w-full"
               id="bank"
               wire:model="bank">
               <option hidden selected>Pilih Bank</option>
               @foreach ($banks as $item)
               <option value="{{ $item['code'] }}">{{ $item['name'] }}</option>
               @endforeach
               <x-jet-input-error for="bank" class="mt-2" />
            </x-simple-select-field>
            {{-- Nama Pemilik --}}
            <x-jet-label for="name" value="{{ __('Nama Pemilik') }}" />
            <x-jet-input type="text" class="mt-1 block w-full"
               id="name"
               wire:model="name" />
            <x-jet-input-error for="name" class="mt-2" />
            {{-- Nomor Rekening --}}
            <x-jet-label for="number" value="{{ __('Nomor Rekening') }}" />
            <x-jet-input type="text" class="mt-1 block w-full"
               id="number"
               wire:model="number" />
            <x-jet-input-error for="number" class="mt-2" />
         </div>
      </x-slot>
      <x-slot name="footer">
         <x-jet-secondary-button wire:click="$toggle('isOpen')" wire:loading.attr="disabled">
            {{ __('Cancel') }}
         </x-jet-secondary-button>
         <x-jet-button class="ml-2"
            wire:click="saveBank"
            wire:loading.attr="disabled">
            {{ __('Simpan') }}
         </x-jet-button>
      </x-slot>
   </x-jet-dialog-modal>
   <!-- Withdraw Confirmation Modal -->
   <x-jet-dialog-modal wire:model="isOpenWd">
      <x-slot name="title">
         {{ __('Tarik saldo') }}
      </x-slot>
      <x-slot name="content">
         {{ __('Pastikan nomor rekening dan nama penerima sudah benar') }}
         <div class="mt-4">
            <p class="mb-4">Saldo : {{ __('Rp' . number_format($data['balance'], 0, ',', '.')) }}</p>
            {{-- Jumlah --}}
            <x-jet-label for="amount" value="{{ __('Jumlah') }}" />
            <x-jet-input min="0" autocomplete="off" type="number" class="mt-1 block w-full"
               id="amount"
               wire:model="amount" />
            <x-jet-input-error for="amount" class="mt-2" />
         </div>
      </x-slot>
      <x-slot name="footer">
         <x-jet-secondary-button wire:click="$toggle('isOpenWd')" wire:loading.attr="disabled">
            {{ __('Cancel') }}
         </x-jet-secondary-button>
         <x-jet-button class="ml-2"
            wire:click="setWithdraw"
            wire:loading.attr="disabled">
            {{ __('Tarik') }}
         </x-jet-button>
      </x-slot>
   </x-jet-dialog-modal>
</div>