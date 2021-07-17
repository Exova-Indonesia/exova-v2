<div>
<section id="kategori" class="bg-white mb-12">
   <div class="container items-center max-w-6xl px-4 mx-auto sm:px-20 md:px-32 lg:px-16">
      <h2 class="text-3xl text-center mb-6 text-gray-800 font-bold leading-tight tracking-tight sm:text-4xl font-heading">Kategori Exova</h2>
      <div class="text-center">
         <div class="flex flex-row flex-wrap justify-center text-center gap-1">
            @foreach ($category as $item)
            <a class="cursor-pointer m-3 hover:scale-110 duration-500 transform">
               <span class="px-4 py-2 text-base rounded-full text-indigo-500 border border-indigo-500">{{ $item['name'] }}</span>
            </a>
            @endforeach
         </div>
      </div>
   </div>
</section>
</div>
