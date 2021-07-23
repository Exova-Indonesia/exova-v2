<div class="relative bg-cover bg-white flex flex-col-reverse py-16 lg:pt-0 lg:flex-col lg:pb-0" style="background-image: url({{ asset('images/banner.jpg') }});">
  <div class="relative flex flex-col items-start w-full px-4 mx-auto md:px-0">
    <div class="lg:m-16 lg:my-40 lg:max-w-lg lg:pr-5">
        <h2 class="max-w-lg mb-6 font-sans text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl sm:leading-none">
         Cari Jasa Dokumentasi?<br class="hidden md:block" />
          <span class="inline-block text-blue-600">Exova Aja!</span>
        </h2>
      <p class="pr-5 mb-5 text-base text-gray-700 md:text-lg">
        Exova siap membantu kebutuhan dokumentasi acara kamu! Mulai dari Rp500k kamu bisa mendapatkan freelancer terbaik di bidangnya 
      </p>
      <div class="flex items-center">
        <a
          href="{{ url('products') }}"
          class="inline-flex items-center justify-center h-12 px-6 mr-6 font-medium tracking-wide text-white transition duration-200 rounded shadow-md bg-blue-600 rounded-t-full rounded-l-full hover:bg-blue-700 focus:shadow-outline focus:outline-none"
        >
         Cari Jasa <span class="hidden lg:block">/Freelancer</span>
        </a>
        <a
          href="@auth {{ url('user/studio', auth()->user()->username) }} @else {{ route('login') }} @endauth"
          class="inline-flex items-center justify-center h-12 px-6 mr-6 font-medium tracking-wide text-white transition duration-200 rounded shadow-md bg-purple-600 rounded-t-full rounded-l-full hover:bg-purple-700 focus:shadow-outline focus:outline-none"
        >
         Jual Jasa
        </a>
      </div>
    </div>
  </div>
</div>