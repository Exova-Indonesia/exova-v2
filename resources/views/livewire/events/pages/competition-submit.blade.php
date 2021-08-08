<div>
   {{-- <x-app-layout> --}}
      <x-slot name="header">
        @livewire('events.components.topnav')
      </x-slot>
    <form action="{{ route('competition.submit') }}" method="post">
        @csrf
        <input type="hidden" name="competition_id" wire:model="{{ $comp['id'] }}">
        <div class="lg:m-16 mt-8">
            <h2 class="text-center font-medium text-lg">{{ $comp['title'] }}</h2>
            <div>
              <div class="p-8">
                  <div class="flex justify-between">
                      <div>
                          <x-jet-button type="button" class="mx-1 bg-pink-500 hover:bg-pink-600 focus:border-pink-600 active:bg-pink-900" wire:click="back" wire:loading.attr="disabled" wire:target="files">
                          {{ __('Batal') }}
                          </x-jet-button>
                      </div>
                      <div>
                          <x-jet-button type="button" class="mx-1 bg-blue-500 hover:bg-blue-600 focus:border-blue-600 active:bg-blue-900" type="submit" wire:loading.attr="disabled" wire:target="files">
                          {{ __('Kirim') }}
                          </x-jet-button>
                      </div>
                  </div>
                  {{-- Content --}}
                  <div class="py-8 grid grid-cols-1 md:grid-cols-3 md:gap-8">
                      <div>
                          <h2 class="text-center font-medium text-lg">File Karya</h2>
                          <div>
                              <x-competition-filepond-upload
                              accept="image/*"
                              data-max-file-size="25MB"/>
                          </div>
                          <x-jet-input-error for="files" class="mt-2" />
                        {{-- URl --}}
                          <div class="my-2">
                              <x-jet-label for="url" value="{{ __('Link Alternatif (Opsional)') }}" />
                              <x-jet-input type="text" name="url" class="mt-1 block w-full" placeholder="{{ __('Link Google Drive') }}" />
                          </div>
                        </div>
                      <div class="col-span-2">
                          <h2 class="text-center font-medium text-lg">Detail</h2>
                          {{-- User --}}
                          <div class="grid grid-cols-1 md:grid-cols-2 gap-1">
                          {{-- Name --}}
                          <div class="my-2">
                              <x-jet-label for="name" value="{{ __('Nama Peserta') }}" />
                              <x-jet-input readonly type="text" class="mt-1 block w-full" wire:model="name" autocomplete="name" />
                              <x-jet-input-error for="name" class="mt-2" />
                          </div>
                          {{-- Address --}}
                          <div class="my-2">
                              <x-jet-label for="address" value="{{ __('Alamat Peserta') }}" />
                              <x-jet-input readonly type="text" class="mt-1 block w-full" wire:model="address" autocomplete="name" />
                              <x-jet-input-error for="address" class="mt-2" />
                          </div>
                          </div>
                          <!-- Project name -->
                          <div class="col-span-6 sm:col-span-4 my-2">
                          <x-jet-label for="title" value="{{ __('Judul Karya') }}" />
                          <x-jet-input name="title" id="title" type="text" class="mt-1 block w-full" autocomplete="title" />
                          <x-jet-input-error for="title" class="mt-2" />
                          </div>
                          <!-- Description -->
                          <div class="col-span-6 sm:col-span-4">
                              <x-jet-label for="deskripsi" value="{{ __('Deskripsi Karya') }}" />
                              <x-simple-textarea-field type="text" class="mt-1 block w-full"
                                  rows="5"
                                  id="deskripsi"
                                  name="description"
                                  maxlength="400">
                              </x-simple-textarea-field>
                              <x-jet-input-error for="description" class="mt-2" />
                          </div>
                      </div>
                  </div>
              </div>
              </div>
        </div>
    </form>
   {{-- </x-app-layout> --}}
</div>