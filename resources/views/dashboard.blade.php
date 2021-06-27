<x-app-layout>
    <x-slot name="navbar">
    </x-slot>
    @livewire('dashboard.jumbotron')
    @livewire('dashboard.tutorials')
    @livewire('dashboard.features')
    {{-- @livewire('dashboard.trends') --}}
    @livewire('dashboard.category')
    @livewire('dashboard.styles')
    @livewire('dashboard.testimonials')
    <x-slot name="footer">
    </x-slot>
</x-app-layout>
