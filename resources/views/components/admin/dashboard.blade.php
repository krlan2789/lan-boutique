<x-layout.layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:admin>{{ $admin }}</x-slot:admin>

    <main>
        <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
            {{ $admin->employee->name }}
        </div>
    </main>
</x-layout.layout>
