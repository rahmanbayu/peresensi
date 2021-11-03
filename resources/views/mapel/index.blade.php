<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex items-center justify-between">
            <span>{{ __('Sesi Matapelajaran') }}</span>
            <a href="{{ route('mapel.create') }}" class="text-sm font-medium py-1.5 px-3 rounded-md bg-gray-800 text-white">Buat Sesi Pelajaran</a>
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="w-full table-auto">
                        <thead>
                            <tr class="text-left px-2 text-sm">
                                <th>No</th>
                                <th>Nama</th>
                                <th>Status</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($mapels as $index => $item)
                                <tr>
                                    <td class="py-2.5">{{ $index + 1 }}</td>
                                    <td class="py-2.5">{{ $item->name }}</td>
                                    <td class="py-2.5">
                                        @if ($item->finish == 0)
                                            <span class="text-sm font-medium text-yellow-400">Berlangsung</span>
                                        @else
                                            <span class="text-sm font-medium text-green-500">Selesai</span>
                                        @endif
                                    </td>
                                    <td class="py-2.5">
                                        <div class="flex items-center justify-end space-x-2">
                                            <a href="{{ route('mapel.show', $item) }}" class="text-sm font-medium py-1.5 px-3 rounded-md bg-purple-500 text-white">Open</a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <th colspan="5" class="text-center py-5">Empty Record!</th>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
