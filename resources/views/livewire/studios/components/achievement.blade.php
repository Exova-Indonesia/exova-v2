<div>
    <div class="grid lg:grid-cols-3 grid-cols-1 gap-2">
        <div class="mt-8">
            @livewire('components.card-ranks', ['data' => $data])
        </div>
        <div class="lg:col-span-2">
            @livewire('components.card-achievement', ['data' => $data])
        </div>
    </div>
</div>
