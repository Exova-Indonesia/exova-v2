
<div>
   <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 grid lg:grid-cols-2 grid-cols-1 gap-2">
      @foreach ($data as $item)
         @livewire('components.card-freelancer', ['data' => $item], key($item->id))
      @endforeach
   </div>
</div>