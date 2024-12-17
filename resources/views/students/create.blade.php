<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Nilai Mahasiswa</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex items-center justify-center" style="background: linear-gradient(135deg, #e0f7fa, #00bcd4); box-shadow: 0 4px 30px rgba(0, 188, 212, 0.5);">
    <div class="flex flex-col md:flex-row gap-4 w-full max-w-screen-xl p-4">
        <!-- Form Input Mahasiswa di Sisi Kiri -->  
        <div class="bg-white p-8 rounded-lg shadow-2xl w-full md:w-1/3">
            <h1 class="text-2xl font-bold mb-6 text-center text-cyan-500">Input Data Mahasiswa</h1>

            {{-- Menampilkan Pesan Sukses --}}
            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Menampilkan Hasil Nilai --}}
            @if(session('nilai'))
                <div class="mb-6 p-4 bg-blue-100 text-blue-700 rounded">
                    <h2 class="text-xl font-semibold mb-2">Hasil Nilai</h2>
                    <p><strong>Nama:</strong> {{ session('nilai')->nama }}</p>
                    <p><strong>NPM:</strong> {{ session('nilai')->nim }}</p>
                    <p><strong>Nilai Kehadiran:</strong> {{ session('nilai')->absen->nilai_kehadiran }}</p>
                    <p><strong>Rata-rata Nilai:</strong> {{ number_format(session('nilai')->rata_rata_nilai, 2) }}</p>
                    <p><strong>Nilai Akhir (Grade):</strong> {{ session('nilai')->nilai_akhir }}</p>
                </div>
            @endif

            <!-- Form Input -->
            <form action="{{ route('students.store') }}" method="POST" class="space-y-4">
                @csrf
                <!-- Nama -->
                <div>
                    <label for="nama" class="block font-bold text-cyan-500">Nama</label>
                    <input 
                        type="text" 
                        name="nama" 
                        id="nama" 
                        class="mt-1 block w-full px-4 py-2 border border-cyan-500 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 {{ $errors->has('nama') ? 'border-red-500' : 'border-cyan-500' }}"
                        value="{{ old('nama') }}" 
                        required
                    >
                    @error('nama')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- NPM -->
                <div>
                    <label for="npm" class="block font-bold text-cyan-500">NPM</label>
                    <input 
                        type="number" 
                        name="npm" 
                        id="npm" 
                        class="mt-1 block w-full px-4 py-2 border border-cyan-500 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 {{ $errors->has('npm') ? 'border-red-500' : 'border-cyan-500' }}"
                        value="{{ old('npm') }}" 
                        required
                    >
                    @error('npm')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Kehadiran 1 -->
                <div>
                    <label for="kehadiran1" class="block font-bold text-cyan-500">Kehadiran 1</label>
                    <input 
                        type="number" 
                        name="kehadiran1" 
                        id="kehadiran1" 
                        class="mt-1 block w-full px-4 py-2 border border-cyan-500 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 {{ $errors->has('kehadiran1') ? 'border-red-500' : 'border-cyan-500' }}"
                        value="{{ old('kehadiran1') }}" 
                        required
                    >
                    @error('kehadiran1')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Kehadiran 2 -->
                <div>
                    <label for="kehadiran2" class="block font-bold text-cyan-500">Kehadiran 2</label>
                    <input 
                        type="number" 
                        name="kehadiran2" 
                        id="kehadiran2" 
                        class="mt-1 block w-full px-4 py-2 border border-cyan-500 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 {{ $errors->has('kehadiran2') ? 'border-red-500' : 'border-cyan-500' }}"
                        value="{{ old('kehadiran2') }}" 
                        required
                    >
                    @error('kehadiran2')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Nilai Tugas -->
                <div>
                    <label for="nilai_tugas" class="block font-bold text-cyan-500">Nilai Tugas</label>
                    <input 
                        type="number" 
                        name="nilai_tugas" 
                        id="nilai_tugas" 
                        class="mt-1 block w-full px-4 py-2 border border-cyan-500 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500  {{ $errors->has('nilai_tugas') ? 'border-red-500' : 'border-cyan-500' }}"
                        value="{{ old('nilai_tugas') }}" 
                        required
                    >
                    @error('nilai_tugas')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Nilai UAS -->
                <div>
                    <label for="nilai_uas" class="block font-bold text-cyan-500">Nilai UAS</label>
                    <input 
                        type="number" 
                        name="nilai_uas" 
                        id="nilai_uas" 
                        class="mt-1 block w-full px-4 py-2 border border-cyan-500 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 {{ $errors->has('nilai_uas') ? 'border-red-500' : 'border-cyan-500' }}"
                        value="{{ old('nilai_uas') }}" 
                        required
                    >
                    @error('nilai_uas')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Nilai UTS -->
                <div>
                    <label for="nilai_uts" class="block font-bold text-cyan-500">Nilai UTS</label>
                    <input 
                        type="number" 
                        name="nilai_uts" 
                        id="nilai_uts" 
                        class="mt-1 block w-full px-4 py-2 border border-cyan-500 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 {{ $errors->has('nilai_uts') ? 'border-red-500' : 'border-cyan-500' }} "
                        value="{{ old('nilai_uts') }}" 
                        required
                    >
                    @error('nilai_uts')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tombol -->
                <div class="flex justify-center space-x-4 mt-3">
                    <button type="reset" class="text-white font-bold px-4 py-2 rounded-full bg-red-500 hover:bg-red-600 transform hover:scale-110 transition-transform duration-300">
                        Hapus
                    </button>
                
                    <button type="submit" class="text-white font-bold px-4 py-2 rounded-full bg-blue-500 hover:bg-blue-600 transform hover:scale-110 transition-transform duration-300">
                        Hitung
                    </button>

                    <button type="submit" class="text-white font-bold px-4 py-2 rounded-full bg-cyan-500 hover:bg-cyan-600 transform hover:scale-110 transition-transform duration-300">
                        Simpan
                    </button>
                </div>
            </form>
        </div>

        <!-- Tabel Daftar Nilai Mahasiswa di Sisi Kanan -->       
        <div class="bg-white p-8 rounded-lg shadow-2xl w-full md:w-2/3">
            <h1 class="text-2xl font-bold mb-6 text-center text-cyan-500">Daftar Nilai Mahasiswa</h1>
            <div class="overflow-hidden rounded-lg border border-cyan-600 shadow-2xl"> <!-- Support scrolling jika layar sempit -->
                <table class="min-w-full table-auto text-center">
                    <thead>
                        <tr class="bg-cyan-500 text-sm font-medium text-white">
                            <th class="border-b px-4 py-2">#</th>
                            <th class="border-b px-4 py-2">Nama</th>
                            <th class="border-b px-4 py-2">NPM</th>
                            <th class="border-b px-4 py-2">Nilai Kehadiran</th>
                            <th class="border-b px-4 py-2">Nilai Rata-rata</th>
                            <th class="border-b px-4 py-2">Nilai Akhir (Grade)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($nilai as $item)
                            <tr>
                                <td class="border-b px-4 py-2">{{ $loop->iteration }}</td>
                                <td class="border-b px-4 py-2">{{ $item->nama }}</td>
                                <td class="border-b px-4 py-2">{{ $item->nim }}</td>
                                <td class="border-b px-4 py-2">{{ $item->absen->nilai_kehadiran }}</td>
                                <td class="border-b px-4 py-2">{{ number_format($item->rata_rata_nilai, 2) }}</td>
                                <td class="border-b px-4 py-2">{{ $item->nilai_akhir }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td class="border-b px-4 py-2 text-center" colspan="6">Tidak ada data tersedia.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
