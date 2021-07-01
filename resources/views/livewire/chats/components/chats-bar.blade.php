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
            <p>Photographer</p>
         </div>
      </div>
      <div class="flex">
         <a href="#" class="block rounded-full hover:bg-gray-700 bg-gray-800 w-10 h-10 p-3">
            <svg viewBox="0 0 20 20" class="w-full h-full fill-current text-blue-500">
               <path d="M11.1735916,16.8264084 C7.57463481,15.3079672 4.69203285,12.4253652 3.17359164,8.82640836 L5.29408795,6.70591205 C5.68612671,6.31387329 6,5.55641359 6,5.00922203 L6,0.990777969 C6,0.45097518 5.55237094,3.33066907e-16 5.00019251,3.33066907e-16 L1.65110039,3.33066907e-16 L1.00214643,8.96910337e-16 C0.448676237,1.13735153e-15 -1.05725384e-09,0.445916468 -7.33736e-10,1.00108627 C-7.33736e-10,1.00108627 -3.44283713e-14,1.97634814 -3.44283713e-14,3 C-3.44283713e-14,12.3888407 7.61115925,20 17,20 C18.0236519,20 18.9989137,20 18.9989137,20 C19.5517984,20 20,19.5565264 20,18.9978536 L20,18.3488996 L20,14.9998075 C20,14.4476291 19.5490248,14 19.009222,14 L14.990778,14 C14.4435864,14 13.6861267,14.3138733 13.2940879,14.7059121 L11.1735916,16.8264084 Z"/>
            </svg>
         </a>
         <a href="#" class="block rounded-full hover:bg-gray-700 bg-gray-800 w-10 h-10 p-3 ml-4">
            <svg viewBox="0 0 20 20" class="w-full h-full fill-current text-blue-500">
               <path d="M2.92893219,17.0710678 C6.83417511,20.9763107 13.1658249,20.9763107 17.0710678,17.0710678 C20.9763107,13.1658249 20.9763107,6.83417511 17.0710678,2.92893219 C13.1658249,-0.976310729 6.83417511,-0.976310729 2.92893219,2.92893219 C-0.976310729,6.83417511 -0.976310729,13.1658249 2.92893219,17.0710678 Z M9,11 L9,10.5 L9,9 L11,9 L11,15 L9,15 L9,11 Z M9,5 L11,5 L11,7 L9,7 L9,5 Z"/>
            </svg>
         </a>
      </div>
   </div>
   <div class="cursor-pointer bg-blue-600 hover:bg-blue-700 duration-500 px-6 py-4 flex flex-row flex-none justify-center items-center shadow">
      <div class="flex">
         Kirim Penawaran
      </div>
   </div>
   <div class="chat-body p-4 flex-1 overflow-y-scroll">
      @foreach ($fetchMessages as $msg)
      @if($msg['to_id'] == $user)
         <div class="my-1 flex flex-row justify-start">
            <div class="messages text-sm text-gray-700 grid grid-flow-row gap-2">
               <div class="flex items-center group">
                  <p class="px-6 py-3 rounded-t-full rounded-r-full bg-gray-800 max-w-xs lg:max-w-md text-gray-200">{{ $msg['messages'] }}</p>
               </div>
            </div>
         </div>
      @endif
      @if($msg['from_id'] == $user)
         <div class="my-1 flex flex-row justify-end">
            <div class="messages text-sm text-white grid grid-flow-row gap-2">
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
      <div class="flex flex-row items-center p-4">
         {{-- Files --}}
         <button type="button" class="flex flex-shrink-0 focus:outline-none mx-2 block text-blue-600 hover:text-blue-700 w-6 h-6">
            <svg viewBox="0 0 20 20" class="w-full h-full fill-current">
               <path d="M10,1.6c-4.639,0-8.4,3.761-8.4,8.4s3.761,8.4,8.4,8.4s8.4-3.761,8.4-8.4S14.639,1.6,10,1.6z M15,11h-4v4H9  v-4H5V9h4V5h2v4h4V11z"/>
            </svg>
         </button>
         {{-- Picture --}}
         <label for="pics" class="flex flex-shrink-0 focus:outline-none mx-2 block text-blue-600 hover:text-blue-700 w-6 h-6">
            <svg viewBox="0 0 20 20" class="w-full h-full fill-current">
               <path d="M11,13 L8,10 L2,16 L11,16 L18,16 L13,11 L11,13 Z M0,3.99406028 C0,2.8927712 0.898212381,2 1.99079514,2 L18.0092049,2 C19.1086907,2 20,2.89451376 20,3.99406028 L20,16.0059397 C20,17.1072288 19.1017876,18 18.0092049,18 L1.99079514,18 C0.891309342,18 0,17.1054862 0,16.0059397 L0,3.99406028 Z M15,9 C16.1045695,9 17,8.1045695 17,7 C17,5.8954305 16.1045695,5 15,5 C13.8954305,5 13,5.8954305 13,7 C13,8.1045695 13.8954305,9 15,9 Z" />
            </svg>
         </label>
         <input wire:model="picture" type="file" id="pics" class="hidden">
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
</div>