<div>
    <section class="bg-white -mt-16 mb-16 w-full">
        <div class="container items-center max-w-6xl py-20 px-4 mx-auto sm:px-20 md:px-32 lg:px-16">
            <h2 class="mb-6 text-center text-3xl font-bold leading-tight tracking-tight sm:text-4xl font-heading">Styles Exova</h2>
            <div class="grid sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 gap-6">
                @foreach ($data as $item)
                @livewire('components.card-freelancer', ['data' => $item], key($item->id))
                @endforeach
            </div>
        </div>
    </section>
</div>