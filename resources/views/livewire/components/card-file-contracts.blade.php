
<div class="flex items-center justify-between w-full">
  <div class="h-64 overflow-y-auto w-full items-start rounded bg-white shadow p-4">
    @if ($data['customer_id'] == auth()->user()->id)
    <div class="flex w-full justify-between">
        <div class="text-xl text-gray-900">
            <span>
                {{ __('Kerjaan telah disubmit') }}
            </span>
        </div>
        @if($data['payment']['status'] == \App\Models\Payment::IS_SUCCESS && count($data['files']) > 0 && !in_array($data['status'], [\App\Models\Contract::IS_FINISHED, \App\Models\Contract::IS_CANCELED, \App\Models\Contract::IS_APPROVED, \App\Models\Contract::IS_WAITING_PAYMENT]))
        <div>
            <span wire:click="approveFiles" class="cursor-pointer hover:bg-green-200 duration-500 py-2 px-4 text-xs leading-3 text-green-700 rounded-full bg-green-100">
            {{ __('Approve') }}
            </span>
        </div>
        @endif
        @if($data['payment']['status'] == \App\Models\Payment::IS_SUCCESS  && count($data['returned']) < $data['requests']['max_return'] && !in_array($data['status'], [\App\Models\Contract::IS_FINISHED, \App\Models\Contract::IS_CANCELED, \App\Models\Contract::IS_APPROVED, \App\Models\Contract::IS_WAITING_PAYMENT]))
        <div>
            <span wire:click="reqReturn" class="cursor-pointer hover:bg-yellow-200 duration-500 py-2 px-4 text-xs leading-3 text-yellow-700 rounded-full bg-yellow-100">
            {{ __('Minta Revisi') }}
            </span>
        </div>
        @endif
    </div>
    @else
    @if($data['payment']['status'] == \App\Models\Payment::IS_SUCCESS  && !in_array($data['status'], [\App\Models\Contract::IS_FINISHED, \App\Models\Contract::IS_CANCELED, \App\Models\Contract::IS_WAITING_PAYMENT]))
    <div class="text-xl text-gray-900 mb-2">
        <span>
            {{ __('Submit Kerjaan') }}
        </span>
    </div>
    <x-file-pond-contract wire:model="files"
    allowFileTypeValidation
    allowFileSizeValidation
    maxFileSize="25mb" />
    <div class="text-right">
        <x-jet-button wire:click="submitFiles" type="button" class="my-2 mx-1 bg-indigo-500 hover:bg-indigo-600 focus:border-indigo-600 active:bg-indigo-900" wire:loading.attr="disabled">
            {{ __('Save') }}
        </x-jet-button>
    </div>
    @endif
    @endif
     <div class="w-full overflow-x-scroll xl:overflow-x-hidden">
        @if(count($data['files']) > 0)
        <table class="min-w-full bg-white">
            <thead>
                <tr class="w-full h-16 border-gray-300 border-b py-8">
                    <th role="columnheader" class="text-gray-600 dark:text-gray-400 font-normal px-6 text-center text-sm tracking-normal leading-4">Waktu</th>
                    <th role="columnheader" class="text-gray-600 dark:text-gray-400 font-normal px-6 text-center text-sm tracking-normal leading-4">Files</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($data['files'] as $item)
            <tr class="h-12 border-gray-300 border-b">
                <td class="px-6 text-center whitespace-no-wrap text-sm text-gray-800 dark:text-gray-100 tracking-normal leading-4">
                    {{ $item['file']['created_at']->format('F j, Y h:i a') }}
                </td>
                <td wire:click="downloadFileContract('{{ $item['file'] }}')" class="px-6 cursor-pointer text-center whitespace-no-wrap text-sm text-blue-800 hover:text-blue-700 dark:text-gray-100 tracking-normal leading-4">
                    {{ $item['file']['old_name'] }}
                </td>
            </tr>
            <div wire:loading wire:target="downloadFileContract('{{ $item['file'] }}')">
            <!--code for notification starts-->
                <div role="alert" class="z-20 h-20 xl:w-4/12 mx-auto sm:mx-0 sm:w-6/12 md:w-6/12 justify-between w-10/12 bg-white dark:bg-gray-800 shadow-lg rounded flex fixed left-0 sm:left-auto right-0 sm:top-0 sm:mr-6 mt-16 sm:mt-6 mb-6 sm:mb-0 transition duration-150 ease-in-out" id="notification">
                    <div class="px-2 sm:px-4 border-r border-gray-300 dark:border-gray-700 flex items-center justify-center">
                        <div class="h-12 w-12 sm:h-10 sm:w-10 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="animate-bounce text-gray-600 h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                            </svg>
                        </div>
                    </div>
                    <div class="flex flex-col justify-center xl:-ml-6 pl-4 xl:pl-1 w-3/5">
                        <p tabindex="0" class="focus:outline-none text-sm text-gray-800 dark:text-gray-100 font-semibold">{{ explode(',', $trollMsg)[0] }}</p>
                        <p tabindex="0" class="focus:outline-none text-xs text-gray-600 dark:text-gray-400 font-normal">{{ explode(',', $trollMsg)[1] }}</p>
                    </div>
                    <div class="flex flex-col justify-center border-l items-center border-gray-300 dark:border-gray-700 w-1/3 sm:w-1/6">
                        <div class="pt-2 pb-2 border-b border-gray-300 dark:border-gray-700 w-full flex justify-center">
                            <span wire:click="yaudah" tabindex="0" class="focus:outline-none focus:text-blue-800 hover:underline text-sm text-blue-700 font-bold cursor-pointer">Y udh si</span>
                        </div>
                        <div class="pt-2 pb-2 flex justify-center w-full cursor-pointer">
                            <span wire:click="gamau" tabindex="0" class="focus:outline-none hover:underline focus:text-gray-400 text-sm text-gray-600 dark:text-gray-400 cursor-pointer">Gamau</span>
                        </div>
                    </div>
                </div>
            <!--code for notification ends-->
            </div>
            @endforeach
           </tbody>
        </table>
        @else
        <div class="justify-center p-12 text-gray-900 flex items-center">
            {{ __('Belum ada') }}
        </div>
        @endif
     </div>
  </div>

  <x-jet-dialog-modal wire:model="revisionModal">
      <x-slot name="title">
            <span class="text-gray-800">
                {{ __('Detail permintaan revisi') }}
            </span>
      </x-slot>
      <x-slot name="content">
          <span class="text-gray-600">
            {{ __('Jelaskan apa yang ingin kamu revisi dari project yang telah dikirim') }}
          </span>
          <div class="mt-4" x-data="{}" x-on:confirming-logout-other-browser-sessions.window="setTimeout(() => $refs.password.focus(), 250)">
         <x-simple-textarea-field type="text" class="text-gray-600 mt-1 block w-full"
            rows="5"
            placeholder="{{ __('Jadi gini lo yang aku pengen...') }}"
            x-ref="return_description"
            maxlength="200"
            wire:model="return_description">
         </x-simple-textarea-field>
          </div>
      </x-slot>
      <x-slot name="footer">
          <x-jet-secondary-button wire:click="$toggle('revisionModal')" wire:loading.attr="disabled">
              {{ __('Cancel') }}
          </x-jet-secondary-button>
          <x-jet-button class="ml-2"
                      wire:click="sendRequest"
                      wire:loading.attr="disabled">
              {{ __('Kirim') }}
          </x-jet-button>
      </x-slot>
  </x-jet-dialog-modal>

</div>