<div class="items-center justify-center lg:w-3/5 w-full">
   <div tabindex="0" aria-label="card 1" class="focus:outline-none lg:mb-0 mb-7 p-6 shadow rounded">
      <a href="{{ url('products/' . $product['slug']) }}" class="flex flex-col lg:flex-row items-center border-gray-200 pb-2">
         <img src="{{ $product['cover']['getSmall']['path'] }}" alt="Pictures" class="object-cover w-full h-48 lg:w-56 lg:h-32 rounded-lg" />
         <div class="flex items-start justify-between w-full">
            <div class="pl-3 w-full">
               <p tabindex="0" class="focus:outline-none text-xl pt-4 font-medium leading-5 text-gray-800">{{ Str::limit($product['title'], 50) }}</p>
               <p tabindex="0" class="focus:outline-none text-sm leading-5 py-4 text-gray-600">{{ Str::limit($product['description'], 120) }}</p>
               <div class="px-2">
                  <div tabindex="0" class="focus:outline-none flex justify-between">
                     <div class="py-1 px-4 text-xs leading-3 text-grey-700 rounded-full bg-yellow-100 justify-between flex">
                        <div>
                           <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-current text-yellow-500" viewBox="0 0 20 20" fill="currentColor">
                              <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                           </svg>
                        </div>
                        <div class="pt-1 text-yellow-500">
                           <span>
                              {{ $reviews }} Reviews
                           </span>
                        </div>
                     </div>
                     <div class="py-2 px-4 ml-3 text-xs leading-3 text-indigo-700 rounded-full bg-indigo-100">{{ 'Rp' . number_format($product['price'], 0, ',', '.') }}</div>
                  </div>
               </div>
            </div>
         </div>
      </a>
   </div>
</div>