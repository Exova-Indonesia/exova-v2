<div>
   <div class="flex items-center w-full">
      <div class="flex flex-col w-full p-4 items-center bg-white shadow rounded-lg">
         <div class="text-3xl my-2 capitalize font-medium max-w-7xl">
            Total Point Anda
         </div>
         <div class="text-4xl my-2 text-blue-600">
            {{ $data['xpoints']->sum('value') }}
         </div>
         <div class="text-2xl my-2 capitalize font-medium max-w-7xl">
            {{ $ranks->where('points', '>', $data['xpoints']->sum('value'))->first()['name'] }}
         </div>
         <div>
            <img class="w-32 h-32" src="{{ $ranks->where('points', '>', $data['xpoints']->sum('value'))->first()['icon'] }}" alt="">
         </div>
         <div class="text-lg my-2 capitalize font-medium max-w-7xl">
            {{ $ranks->where('points', '>', $data['xpoints']->sum('value'))->first()['points'] - $data['xpoints']->sum('value') }} Points Menuju {{ $ranks->where('points', '>', $ranks->where('points', '>', $data['xpoints']->sum('value'))->first()['points'])->first()['name'] }}
         </div>
         <div class="flex flex-row justify-between">
            @foreach ($ranks as $item)
            <div class="flex-col">
               <div class="mx-1 w-16 h-16">
                  <img src="{{ $item['icon'] }}" alt="">
               </div>
               <div class="text-md my-2 text-center">
                  {{ $item['name'] }}
               </div>
            </div>
            @endforeach
         </div>
      </div>
   </div>
</div>