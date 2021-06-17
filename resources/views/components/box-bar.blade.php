<div {{ $attributes->merge(['type' => 'submit', 'class' => 'cursor-pointer w-full p-4 shadow-lg h-32 rounded-t sm:rounded-l sm:rounded-t-none shadow dark:bg-gray-800 transform ease-in-out hover:rotate-2 duration-500']) }}>
    <h5 class="mb-2 text-3xl font-bold text-white font-heading">{{ $amount }}</h5>
    <h5 class="mb-2 text-md mt-3 text-gray-100 font-heading">{{ $title }}</h5>
</div>