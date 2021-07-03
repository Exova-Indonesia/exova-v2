<div class="grid lg:grid-cols-2 grid-cols-1 gap-2">
   @livewire('components.card-file-contracts', ['data' => $data])
   <div class="flex items-center justify-between w-full">
      <div class="flex flex-col h-64 lg:flex-col w-full items-start rounded bg-white shadow p-4">
         <div class="text-xl text-gray-900">
            <span>
            Chat Files
            </span>
         </div>
         <div class="w-full overflow-x-scroll xl:overflow-x-hidden">
            <table class="min-w-full bg-white">
               <thead>
                  <tr class="w-full h-16 border-gray-300 border-b py-8">
                     <th role="columnheader" class="text-gray-600 dark:text-gray-400 font-normal px-6 text-center text-sm tracking-normal leading-4">Tanggal</th>
                     <th role="columnheader" class="text-gray-600 dark:text-gray-400 font-normal px-6 text-center text-sm tracking-normal leading-4">Waktu</th>
                  </tr>
               </thead>
               <tbody>
                @forelse ($message as $item)
                    @if(! empty(json_decode($item['attachments'], true)['id']))
                    <tr class="h-12 border-gray-300 border-b">
                        <td class="px-6 text-center whitespace-no-wrap text-sm text-gray-800 dark:text-gray-100 tracking-normal leading-4">
                            {{ $item['created_at']->format('F j, Y h:i a') }}
                        </td>
                        <td wire:click="downloadAssetChat('{{ $item['attachments'] }}')" class="px-6 cursor-pointer text-center whitespace-no-wrap text-sm hover:text-blue-700 text-blue-800 dark:text-gray-100 tracking-normal leading-4">
                            {{ json_decode($item['attachments'], true)['old_name'] }}
                        </td>
                    </tr>
                    @endif
                @empty
                    <div class="justify-center p-12 text-gray-900 flex items-center">
                        {{ __('Belum ada') }}
                    </div>
                @endforelse
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>