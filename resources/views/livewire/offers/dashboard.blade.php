<div class="bg-white py-2 px-4 rounded-lg">
   <div class="grid grid-cols-3 gap-2 pt-2 mb-3">
      <div class="flex justify-center flex-col pt-3 col-span-3">
         <label class="text-xs text-gray-600 ">Judul project</label> 
         <x-jet-input type="text" class="mt-1 block w-full  bg-white text-gray-600"
            x-ref="namaproject"
            wire:model="namaproject" />
      </div>
      <div class="flex justify-center flex-col pt-3">
         <label class="text-xs text-gray-600 ">Mau ketemu penjualnya?</label>
         <x-switch-button wire:model="meetSeller" />
      </div>
      @if(!$isMuted)
      <div class="flex justify-center flex-col pt-3">
         <label class="text-xs text-gray-600 ">Harga yang kamu inginkan</label> 
         <x-jet-input type="text" class="mt-1 block w-full  bg-white text-gray-600"
            x-ref="price"
            wire:model="price" />
      </div>
      @endif
      <div class="flex justify-center flex-col pt-3">
         <label class="text-xs text-gray-600 ">Kapan kamu pengen kontrak ini berakhir?</label> 
         <x-jet-input type="date" class="mt-1 block w-full  bg-white text-gray-600"
            x-ref="contract_end"
            min="{{ now()->addDays(2)->format('Y-m-d') }}"
            wire:model="contract_end" />
      </div>
   </div>
   <div class="grid grid-cols-2 gap-2 pt-2 mb-3">
      @if($meetSeller)
      <div class="flex justify-center flex-col pt-3">
         <label class="text-xs text-gray-600 ">Kapan mau ketemu penjualnya?</label> 
         <x-jet-input type="date" class="mt-1 block w-full  bg-white text-gray-600"
            x-ref="meet_date"
            min="{{ now()->addDays(2)->format('Y-m-d') }}"
            wire:model="meet_date" />
      </div>
      <div class="flex justify-center flex-col pt-3">
         <label class="text-xs text-gray-600 ">Jam berapa?</label> 
         <x-jet-input type="time" class="mt-1 block w-full  bg-white text-gray-600"
            x-ref="meet_time"
            wire:model="meet_time" />
      </div>
      <div class="grid lg:grid-cols-2 grid-cols-1 col-span-3 gap-2">
         <div class="flex justify-center flex-col col-span-2 pt-3">
            <label class="text-xs text-gray-600 ">Lokasinya dimana?</label>
            <x-jet-input type="text" class="mt-1 block w-full  bg-white text-gray-600"
               x-ref="meet_location"
               id="meet_location"
               wire:model="meet_location" />
         </div>
      </div>
      @endif
      @if(!$isMuted)
      <div class="col-span-3">
         <label class="text-xs text-gray-600 ">Jelaskan detail pekerjaan yang ingin kamu berikan</label>          
         <x-simple-textarea-field type="text" class="mt-1 block w-full  bg-white text-gray-600"
            rows="5"
            placeholder="{{ __('Aku pengen fotoan kayak...') }}"
            x-ref="job_description"
            maxlength="200"
            wire:model="job_description">
         </x-simple-textarea-field>
      </div>
      @endif
   </div>
</div>