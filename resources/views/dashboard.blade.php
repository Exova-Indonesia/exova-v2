<x-app-layout>
    <x-slot name="navbar">
    </x-slot>
    @livewire('dashboard.jumbotron')
    @livewire('dashboard.features')
    @livewire('dashboard.trends')
    @livewire('dashboard.category')
    @livewire('dashboard.styles')
    @livewire('dashboard.testimonials')
</x-app-layout>
