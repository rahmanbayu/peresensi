    <div>
        <x-label for="name" :value="__('Name')" />
        <x-input id="name" class="block mt-1 w-full py-1 px-2 focus:outline-none border-gray-300 border" type="name" name="name" :value="old('name', $mahasiswa->name)" required />
    </div>
    <div class="mt-5">
        <x-label for="nim" :value="__('NIM')" />
        <x-input id="nim" class="block mt-1 w-full py-1 px-2 focus:outline-none border-gray-300 border" type="nim" name="nim" :value="old('nim', $mahasiswa->nim)" required />
    </div>
    <div class="mt-5">
        <x-label for="kelas" :value="__('Kelas')" />
        <x-input id="kelas" class="block mt-1 w-full py-1 px-2 focus:outline-none border-gray-300 border" type="kelas" name="kelas" :value="old('kelas', $mahasiswa->kelas)" required />
    </div>
