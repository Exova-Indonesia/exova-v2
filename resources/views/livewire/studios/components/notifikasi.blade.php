<div class="mt-12">
    @foreach ($data as $item)
        @livewire('components.notifikasi-bar', ['data' => $item], key($item->id))
    @endforeach
</div>