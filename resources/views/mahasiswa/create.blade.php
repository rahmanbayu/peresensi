<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex items-center justify-between">
            <span>{{ __('Mahasiswa') }}</span>
            <a href="{{ route('mahasiswa.index') }}" class="text-sm font-medium py-1.5 px-3 rounded-md bg-gray-200 text-gray-500"> &laquo; Kembali</a>
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    <form action="{{ route('mahasiswa.store') }}" method="POST">
                        @csrf
                        @include('mahasiswa._form')
                        <div class="mt-4">
                            <button type="submit" class="text-sm font-medium py-1.5 px-3 rounded-md bg-gray-800 text-white">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
