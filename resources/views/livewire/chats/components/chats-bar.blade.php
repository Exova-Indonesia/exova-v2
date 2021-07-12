<div class="flex flex-col flex-auto border-l border-gray-800 bg-gray-900">
   @if(! empty($this->receipent))
   <div class="chat-header px-6 py-4 flex flex-row flex-none justify-between items-center shadow">
      <div class="flex">
         <div class="w-12 h-12 mr-4 relative flex flex-shrink-0">
            <img class="shadow-md rounded-full w-full h-full object-cover"
               src="{{ $receipent['profile_photo_url'] }}"
               alt=""
               />
         </div>
         <div class="text-sm">
            <p class="font-bold">{{ $receipent['name'] }}</p>
            <p>{{ $receipent['roles']['name'] }}</p>
         </div>
      </div>
      <div class="flex">
         {{-- <a href="#" class="block rounded-full hover:bg-gray-700 bg-gray-800 w-10 h-10 p-3">
            <svg viewBox="0 0 20 20" class="w-full h-full fill-current text-blue-500">
               <path d="M11.1735916,16.8264084 C7.57463481,15.3079672 4.69203285,12.4253652 3.17359164,8.82640836 L5.29408795,6.70591205 C5.68612671,6.31387329 6,5.55641359 6,5.00922203 L6,0.990777969 C6,0.45097518 5.55237094,3.33066907e-16 5.00019251,3.33066907e-16 L1.65110039,3.33066907e-16 L1.00214643,8.96910337e-16 C0.448676237,1.13735153e-15 -1.05725384e-09,0.445916468 -7.33736e-10,1.00108627 C-7.33736e-10,1.00108627 -3.44283713e-14,1.97634814 -3.44283713e-14,3 C-3.44283713e-14,12.3888407 7.61115925,20 17,20 C18.0236519,20 18.9989137,20 18.9989137,20 C19.5517984,20 20,19.5565264 20,18.9978536 L20,18.3488996 L20,14.9998075 C20,14.4476291 19.5490248,14 19.009222,14 L14.990778,14 C14.4435864,14 13.6861267,14.3138733 13.2940879,14.7059121 L11.1735916,16.8264084 Z"/>
            </svg>
         </a> --}}
         <a href="{{ url('/dashboard') }}" class="block rounded-full hover:bg-gray-700 bg-gray-800 w-10 h-10 p-3 ml-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-full h-full fill-current text-blue-500" viewBox="0 0 20 20" fill="currentColor">
               <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
            </svg>
         </a>
      </div>
   </div>
   <div class="cursor-pointer bg-blue-600 duration-500 px-6 py-2 flex flex-row flex-none justify-between items-center shadow">
      <div class="flex justify-end">
         Tawaran {{ ($request['status'] == App\Models\OrderRequest::IS_DECLINED) ? ' Ditolak' : '' }}
      </div>
      @if($seller)
      <div class="flex justify-start">
         @if($request['status'] == App\Models\OrderRequest::IS_REQUESTED)
         <div class="flex">
            <x-jet-button wire:click="approve" type="button" class="my-2 mx-1 bg-green-500 hover:bg-green-600 focus:border-green-600 active:bg-green-900">
               {{ __('Approve') }}
            </x-jet-button>
         </div>
         <div class="flex">
            <x-jet-button wire:click="$toggle('declineModal')" type="button" class="my-2 mx-1 bg-red-500 hover:bg-red-600 focus:border-red-600 active:bg-red-900">
               {{ __('Decline') }}
            </x-jet-button>
         </div>
         @endif
         <div class="flex">
            <x-jet-button wire:click="$toggle('detailModal')" type="button" class="my-2 mx-1 bg-yellow-500 hover:bg-yellow-600 focus:border-yellow-600 active:bg-yellow-900">
               {{ __('Detail') }}
            </x-jet-button>
         </div>
         @if(! empty($request['contract']))
         <div class="flex">
            <x-jet-button wire:click="ruangKontrak('{{ $request['contract']['uuid'] }}')" type="button" class="my-2 mx-1 bg-purple-500 hover:bg-purple-600 focus:border-red-600 active:bg-red-900">
               {{ __('Ruang Kontrak') }}
            </x-jet-button>
         </div>
         @endif
      </div>
      @else
      <div class="flex justify-start">
         @if($request['status'] == App\Models\OrderRequest::IS_REQUESTED)
         <div class="flex">
            <x-jet-button wire:click="fetchOrderReq" type="button" class="my-2 mx-1 bg-green-500 hover:bg-green-600 focus:border-green-600 active:bg-green-900">
               {{ __('Kirim Tawaran') }}
            </x-jet-button>
         </div>
         @else
         <div class="flex">
            <x-jet-button wire:click="$toggle('detailModal')" type="button" class="my-2 mx-1 bg-yellow-500 hover:bg-yellow-600 focus:border-yellow-600 active:bg-yellow-900">
               {{ __('Detail') }}
            </x-jet-button>
         </div>
         @if(! empty($request['contract']))
         <div class="flex">
            <x-jet-button wire:click="ruangKontrak('{{ $request['contract']['uuid'] }}')" type="button" class="my-2 mx-1 bg-purple-500 hover:bg-purple-600 focus:border-red-600 active:bg-red-900">
               {{ __('Ruang Kontrak') }}
            </x-jet-button>
         </div>
         @endif
         @endif
      </div>
      @endif
   </div>
   <div class="chat-body p-4 flex-1 overflow-y-scroll flex flex-col-reverse">
      @foreach (array_reverse($fetchMessages) as $msg)
      @if($msg['to_id'] == $user)
      <div class="my-1 flex flex-row justify-start">
         <div class="messages text-sm text-gray-700 grid grid-flow-row gap-2">
            @if(! empty(json_decode($msg['attachments'], true)['id']))
            @if(in_array(json_decode($msg['attachments'], true)['type'], ['png', 'jpg', 'gif', 'jpeg']))
            <div class="flex items-center group">
               <a class="block w-64 h-64 relative flex flex-shrink-0 max-w-xs lg:max-w-md" target="_blank" href="{{ json_decode($msg['attachments'], true)['path'] }}">
               <img class="absolute shadow-md w-full h-full rounded-l-lg object-cover" src="{{ json_decode($msg['attachments'], true)['path'] }}" alt="photo"/>
               </a>
            </div>
            @else
            <div class="flex items-center group cursor-pointer">
               <p class="text-blue-600 px-6 py-3 rounded-t-full rounded-r-full bg-gray-800 max-w-xs lg:max-w-md">
                  <a target="_blank" href="{{ json_decode($msg['attachments'], true)['path'] }}">
                  {{ json_decode($msg['attachments'], true)['old_name'] }}
                  </a>
               </p>
            </div>
            @endif
            @endif
            <div class="flex items-center group">
               <p class="px-6 py-3 rounded-t-full rounded-r-full bg-gray-800 max-w-xs lg:max-w-md text-gray-200">{{ $msg['messages'] }}</p>
            </div>
         </div>
      </div>
      @endif
      @if($msg['from_id'] == $user)
      <div class="my-1 flex flex-row justify-end">
         <div class="messages text-sm text-white grid grid-flow-row gap-2">
            @if(! empty(json_decode($msg['attachments'], true)['id']))
            @if(in_array(json_decode($msg['attachments'], true)['type'], ['png', 'jpg', 'gif', 'jpeg']))
            <div class="flex items-center group">
               <a class="block w-64 h-64 relative flex flex-shrink-0 max-w-xs lg:max-w-md" target="_blank" href="{{ json_decode($msg['attachments'], true)['path'] }}">
               <img class="absolute shadow-md w-full h-full rounded-l-lg object-cover" src="{{ json_decode($msg['attachments'], true)['path'] }}" alt="photo"/>
               </a>
            </div>
            @else
            <div class="flex items-center flex-row-reverse group cursor-pointer">
               <p class="text-blue-400 px-6 py-3 rounded-t-full rounded-l-full bg-blue-700 max-w-xs lg:max-w-md">
                  <a target="_blank" href="{{ json_decode($msg['attachments'], true)['path'] }}">
                  {{ json_decode($msg['attachments'], true)['old_name'] }}
                  </a>
               </p>
            </div>
            @endif
            @endif
            <div class="flex items-center flex-row-reverse group">
               <p class="px-6 py-3 rounded-t-full rounded-l-full bg-blue-700 max-w-xs lg:max-w-md">{{ $msg['messages'] }}</p>
            </div>
         </div>
      </div>
      @endif
      @endforeach
   </div>
   <div class="chat-footer flex-none">
      @if($picture)
      <div class="items-center py-4 px-8">
         <x-delete-button wire:click="deletePicture" wire:loading.attr="disabled" class="absolute h-8 w-8 bg-red-500 hover:bg-red-600 flex items-start justify-start" />
         <div class="w-32 h-32">
            <img class="w-32 h-32 object-cover rounded-md" src="{{ $picture->temporaryUrl() }}" alt="">
         </div>
      </div>
      @endif
      @if($files)
      <div class="items-center py-4 px-8">
         <x-delete-button wire:click="deletePicture" wire:loading.attr="disabled" class="h-8 w-8 bg-red-500 hover:bg-red-600 flex items-start justify-start" />
         <div class="w-32 h-12">
            {{ $this->idFiles['old_name'] }}
         </div>
      </div>
      @endif
      <div class="flex flex-row items-center p-4">
         {{-- Files --}}
         <label for="fls" class="flex flex-shrink-0 focus:outline-none mx-2 block text-blue-600 hover:text-blue-700 w-6 h-6">
            <svg viewBox="0 0 20 20" class="w-full h-full fill-current">
               <path d="M10,1.6c-4.639,0-8.4,3.761-8.4,8.4s3.761,8.4,8.4,8.4s8.4-3.761,8.4-8.4S14.639,1.6,10,1.6z M15,11h-4v4H9  v-4H5V9h4V5h2v4h4V11z"/>
            </svg>
         </label>
         <input wire:model="files" type="file" id="fls" class="hidden">
         {{-- Picture --}}
         <label for="pics" class="flex flex-shrink-0 focus:outline-none mx-2 block text-blue-600 hover:text-blue-700 w-6 h-6">
            <svg viewBox="0 0 20 20" class="w-full h-full fill-current">
               <path d="M11,13 L8,10 L2,16 L11,16 L18,16 L13,11 L11,13 Z M0,3.99406028 C0,2.8927712 0.898212381,2 1.99079514,2 L18.0092049,2 C19.1086907,2 20,2.89451376 20,3.99406028 L20,16.0059397 C20,17.1072288 19.1017876,18 18.0092049,18 L1.99079514,18 C0.891309342,18 0,17.1054862 0,16.0059397 L0,3.99406028 Z M15,9 C16.1045695,9 17,8.1045695 17,7 C17,5.8954305 16.1045695,5 15,5 C13.8954305,5 13,5.8954305 13,7 C13,8.1045695 13.8954305,9 15,9 Z" />
            </svg>
         </label>
         <input wire:model="picture" accept="image/*" type="file" id="pics" class="hidden">
         <div class="relative flex-grow">
            <label>
            <input class="rounded-full py-2 pl-3 pr-10 w-full border border-gray-800 focus:border-gray-700 bg-gray-800 focus:bg-gray-900 focus:outline-none text-gray-200 focus:shadow-md transition duration-300 ease-in"
               type="text" wire:model="message" wire:keydown.enter="sendMessage({{ $this->receipent['id'] }})" placeholder="Aa"/>
            </label>
         </div>
         <button type="button" wire:click="sendMessage({{ $this->receipent['id'] }})" class="flex flex-shrink-0 focus:outline-none mx-2 block text-blue-600 rounded-full hover:bg-gray-700 bg-gray-800 w-10 h-10 p-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-full h-full fill-current" viewBox="0 0 20 20" fill="currentColor">
               <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z" />
            </svg>
         </button>
      </div>
   </div>
   @else
   <div class="p-64 flex justify-center items-center">
      Choose contacts to chat
   </div>
   @endif
   @if($isUpload)
   <!--code for notification starts-->
   <div role="alert" class="z-20 h-20 xl:w-4/12 mx-auto sm:mx-0 sm:w-6/12 md:w-6/12 justify-between w-10/12 bg-white dark:bg-gray-800 shadow-lg rounded flex fixed left-0 sm:left-auto right-0 sm:top-0 sm:mr-6 mt-16 sm:mt-6 mb-6 sm:mb-0 transition duration-150 ease-in-out" id="notification">
      <div class="px-2 sm:px-4 border-r border-gray-300 dark:border-gray-700 flex items-center justify-center">
         <div class="h-12 w-12 sm:h-10 sm:w-10 rounded-full">
            <svg xmlns="http://www.w3.org/2000/svg" class="animate-bounce text-gray-600 h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
            </svg>
         </div>
      </div>
      <div class="flex flex-col justify-center xl:-ml-6 pl-4 xl:pl-1 w-3/5">
         <p tabindex="0" class="focus:outline-none text-sm text-gray-800 dark:text-gray-100 font-semibold">{{ explode(',', $trollMsg)[0] }}</p>
         <p tabindex="0" class="focus:outline-none text-xs text-gray-600 dark:text-gray-400 font-normal">{{ explode(',', $trollMsg)[1] }}</p>
      </div>
      <div class="flex flex-col justify-center border-l items-center border-gray-300 dark:border-gray-700 w-1/3 sm:w-1/6">
         <div wire:click="yaudah" class="pt-2 pb-2 border-b border-gray-300 dark:border-gray-700 w-full flex justify-center">
            <span tabindex="0" class="focus:outline-none focus:text-blue-800 hover:underline text-sm text-blue-700 font-bold cursor-pointer">Y udh si</span>
         </div>
         <div wire:click="gamau" class="pt-2 pb-2 flex justify-center w-full cursor-pointer">
            <span tabindex="0" class="focus:outline-none hover:underline focus:text-gray-400 text-sm text-gray-600 dark:text-gray-400 cursor-pointer">Gamau</span>
         </div>
      </div>
   </div>
   <!--code for notification ends-->
   @endif
   
   <x-jet-dialog-modal wire:model="detailModal">
      <x-slot name="title">
         <span class="text-gray-800">
             {{ __('Detail Tawaran Kontrak') }}
         </span>
      </x-slot>
      
      <x-slot name="content">
         <div class="mt-4">
            <table class="w-full text-gray-800">
               <tr class="border-b border-gray-200">
                  <td class="p-2">Project</td>
                  <td class="text-right p-2">{{ $request['title'] }}</td>
               </tr>
               <tr class="border-b border-gray-200">
                  <td class="p-2">Deskripsi</td>
                  <td class="text-right p-2">{{ $request['description'] }}</td>
               </tr>
               <tr class="border-b border-gray-200">
                  <td class="p-2">Maksimal Revisi</td>
                  <td class="text-right p-2">{{ $request['max_return'] .' Kali' }}</td>
               </tr>
               <tr class="border-b border-gray-200">
                  <td class="p-2">Ketemu Seller?</td>
                  <td class="text-right p-2">
                     @if($request['is_meet_seller'])
                     <div>
                        <span class="cursor-pointer duration-500 py-2 px-4 text-xs leading-3 text-green-700 rounded-full bg-green-100">
                        Ya
                        </span>
                     </div>
                     @else
                     <div>
                        <span class="cursor-pointer duration-500 py-2 px-4 text-xs leading-3 text-red-700 rounded-full bg-red-100">
                        Tidak
                        </span>
                     </div>
                     @endif
                  </td>
               </tr>
               @if($request['is_meet_seller'])
               <tr class="border-b border-gray-200">
                  <td class="p-2">Ketemu Kapan?</td>
                  <td class="text-right p-2">{{ $request['meet_at']->format('F j, Y h:i a') }}</td>
               </tr>
               @endif
               <tr class="border-b border-gray-200">
                  <td class="p-2">Harga</td>
                  <td class="text-right p-2">{{ 'Rp' . number_format($request['price'], 0, ',', '.') }}</td>
               </tr>
               @if($detailModal)
               <tr class="border-b border-gray-200">
                  <td class="p-2">Deadline</td>
                  <td class="text-right p-2">{{ $request['due_at']->format('F j, Y h:i a') }}</td>
               </tr>
               @endif
            </table>
         </div>
      </x-slot>
      <x-slot name="footer">
         <x-jet-secondary-button wire:click="$toggle('detailModal')" wire:loading.attr="disabled">
             {{ __('Tutup') }}
         </x-jet-secondary-button>
      </x-slot>
  </x-jet-dialog-modal>

   <x-jet-dialog-modal wire:model="declineModal">
      <x-slot name="title">
         <span class="text-gray-800">
             {{ __('Detail Tawaran Kontrak') }}
         </span>
      </x-slot>
      
      <x-slot name="content">
         <span class="text-gray-600">
           {{ __('Udah yakin mau ditolak begitu saja?') }}
         </span>
      </x-slot>
      <x-slot name="footer">
         <x-jet-secondary-button wire:click="$toggle('declineModal')" wire:loading.attr="disabled">
             {{ __('Tutup') }}
         </x-jet-secondary-button>
         <x-jet-button class="ml-2 bg-red-500 hover:bg-red-600"
            wire:click="decline"
            wire:loading.attr="disabled">
            {{ __('Yakin') }}
         </x-jet-button>
      </x-slot>
  </x-jet-dialog-modal>

   <x-jet-dialog-modal wire:model="sendTawaranModal">
      <x-slot name="title">
         <span class="text-gray-800">
             {{ __('Detail Tawaran Kontrak') }}
         </span>
      </x-slot>
      
      <x-slot name="content">
         <span class="text-gray-600">
           {{ __('Lengkapi semua kolom dengan baik dan benar') }}
         </span>
         <div class="mt-4">
            @livewire('offers.dashboard', ['mute' => false])
         </div>
      </x-slot>
      <x-slot name="footer">
         <x-jet-secondary-button wire:click="$toggle('sendTawaranModal')" wire:loading.attr="disabled">
             {{ __('Tutup') }}
         </x-jet-secondary-button>
         <x-jet-button class="ml-2 bg-gray-500 hover:bg-gray-600"
            wire:click="updateRequest"
            wire:loading.attr="disabled">
            {{ __('Kirim') }}
         </x-jet-button>
      </x-slot>
  </x-jet-dialog-modal>
  
</div>