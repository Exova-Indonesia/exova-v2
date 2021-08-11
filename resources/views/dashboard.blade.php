<x-app-layout>
    <x-slot name="navbar">
    </x-slot>
    @livewire('dashboard.jumbotron')
    @livewire('dashboard.events')
    @livewire('dashboard.tutorials')
    @livewire('dashboard.features')
    {{-- @livewire('dashboard.trends') --}}
    @livewire('dashboard.category')
    @livewire('dashboard.styles')
    {{-- @livewire('dashboard.top-freelancers') --}}
    @livewire('dashboard.testimonials')
    <x-slot name="footer">
    </x-slot>
</x-app-layout>
