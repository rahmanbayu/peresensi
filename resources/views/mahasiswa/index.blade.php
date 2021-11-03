<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex items-center justify-between">
            <span>{{ __('Mahasiswa') }}</span>
            <a href="{{ route('mahasiswa.create') }}" class="text-sm font-medium py-1.5 px-3 rounded-md bg-gray-800 text-white">Masukan Mahasiswa</a>
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
                                <th>NIM</th>
                                <th>Kelas</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($mahasiswas as $index => $item)
                                <tr>
                                    <td class="py-2.5">{{ $index + 1 }}</td>
                                    <td class="py-2.5">{{ $item->name }}</td>
                                    <td class="py-2.5">{{ $item->nim }}</td>
                                    <td class="py-2.5">{{ $item->kelas }}</td>
                                    <td class="py-2.5">
                                        <div class="flex items-center justify-end space-x-2">
                                            <a href="{{ route('mahasiswa.generate', $item) }}" class="text-sm font-medium py-1.5 px-3 rounded-md bg-purple-500 text-white">QR</a>
                                            <a href="{{ route('mahasiswa.edit', $item) }}" class="text-sm font-medium py-1.5 px-3 rounded-md bg-green-500 text-white">Edit</a>
                                            <form action="{{ route('mahasiswa.destroy', $item) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="text-sm font-medium py-1.5 px-3 rounded-md bg-red-500 text-white">Delete</button>
                                            </form>
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
