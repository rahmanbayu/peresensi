<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex items-center justify-between">
            <span>{{ $mapel->name }}</span>
            <div class="flex items-center space-x-3">
                @if ($mapel->finish == 0)
                    <form action="{{ route('mapel.close', $mapel) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button class="text-sm font-medium py-1.5 px-3 rounded-md bg-red-500 text-white">Tutup Sesi Perkuliahan</button>
                    </form>
                @endif
                <a href="{{ route('mapel.index') }}" class="text-sm font-medium py-1.5 px-3 rounded-md bg-gray-200 text-gray-500"> &laquo; Kembali</a>
            </div>
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if ($mapel->finish == 0)
                        <div id="qr-scanner" getmahasiswa="{{ route('qr.get-mahasiswa', $mapel) }}" endpoint="{{ route('qr.process', $mapel) }}"></div>
                    @else
                        <h1 class="text-2xl font-medium text-center pb-10">DAFTAR HADIR HINGGA PERKULIAHAN BERAKHIR</h1>
                        <table class="w-full table-auto">
                            <thead>
                                <tr class="text-left px-2 text-sm">
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>NIM</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mapel->mahasiswas as $index => $item)
                                    <tr key={index}>
                                        <td class="py-2 text-gray-700">{{ $index + 1 }}</td>
                                        <td class="py-2 text-gray-700">{{ $item->name }}</td>
                                        <td class="py-2 text-gray-700">{{ $item->nim }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
