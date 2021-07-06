<div class="grid grid-cols-1 gap-2 bg-white shadow p-4">
   <div class="flex items-center justify-between w-full">
      <div class="flex flex-col overflow-y-auto lg:flex-col w-full items-start rounded ">
         <div class="text-xl text-gray-900">
            <span>
            Client Feedback
            </span>
         </div>
         @if(! empty($data['feedback']))
         <div class="my-4 w-full">
            <div class="chat-header px-6 py-4 flex flex-row flex-none justify-between items-center">
               <div class="flex">
                  <div class="w-12 h-12 mr-4 relative flex flex-shrink-0">
                     <img class="shadow-md rounded-full w-full h-full object-cover"
                        src="{{ $data['feedback']['user']['profile_photo_url'] }}"
                        alt=""
                        />
                  </div>
                  <div class="text-sm text-gray-900">
                     <p class="font-bold">{{ $data['feedback']['user']['name'] }}</p>
                     <p>{{ $data['feedback']['comment'] }}</p>
                  </div>
               </div>
               <div class="flex">
                  <div class="text-sm text-gray-900">
                     <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                     </svg>
                     <p>{{ $data['feedback']['created_at']->diffForHumans() }}</p>
                  </div>
               </div>
            </div>
         </div>
         @else
         <div class="flex flex-col m-auto text-gray-700">
            <div>
               <img src="{{ asset('icons/empty.svg') }}" alt="">
            </div>
            <div>
               <p class="text-center py-3">Belum ada feedback</p>
            </div>
         </div>
         @endif
      </div>
   </div>
   @if(empty($data['feedback']) && $data['customer_id'] == auth()->user()->id)
   <div>
      <div class="rating-star my-4">
         <div class="form-group text-center">
            <div class="input-rating">
               <div class="stars">
                  <input type="radio" wire:model="value" id="star5" name="rating" value="5" /><label for="star5"></label>
               </div>
               @error('rating')
               <div class="alert alert-danger">{{ $message }}</div>
               @enderror
            </div>
         </div>
      </div>
      <x-simple-textarea-field type="text" class="mt-1 block w-full text-gray-400"
         rows="5"
         placeholder="{{ __('Keren...') }}"
         x-ref="comment"
         maxlength="200"
         wire:model="comment">
      </x-simple-textarea-field>
   </div>
   <div class="text-right">
      <x-jet-button class=""
         wire:click="sendfeedback"
         wire:loading.attr="disabled">
         {{ __('Kirim') }}
      </x-jet-button>
   </div>
   @endif
</div>