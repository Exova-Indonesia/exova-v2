
<div class="flex items-center justify-between w-full">
  <div class="h-64 overflow-y-auto w-full items-start rounded bg-white shadow p-4">
    @if ($data['customer_id'] == auth()->user()->id)
    <div class="flex w-full justify-between">
        <div class="text-xl text-gray-900">
            <span>
                {{ __('Kerjaan telah disubmit') }}
            </span>
        </div>
        <div>
            <span wire:click="reqReturn" class="cursor-pointer hover:bg-yellow-200 duration-500 py-2 px-4 text-xs leading-3 text-yellow-700 rounded-full bg-yellow-100">
            {{ __('Minta Revisi') }}
            </span>
        </div>
    </div>
    @else
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
          {{ __('Detail permintaan revisi') }}
      </x-slot>
      <x-slot name="content">
          {{ __('Jelaskan apa yang ingin kamu revisi dari project yang telah dikirim') }}
          <div class="mt-4" x-data="{}" x-on:confirming-logout-other-browser-sessions.window="setTimeout(() => $refs.password.focus(), 250)">
         <x-simple-textarea-field type="text" class="mt-1 block w-full"
            rows="5"
            placeholder="{{ __('Jadi gini lo yang aku pengen...') }}"
            x-ref="job_description"
            maxlength="200"
            wire:model="job_description">
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