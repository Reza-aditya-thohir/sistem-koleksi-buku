@extends('dashboard.layouts.main')
@section('container')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-semibold mb-4">Edit Profile</h1>

        @if (session('success'))
            <div class="mb-4 text-green-500">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="mb-4 text-red-500">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('profile.update_profile') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="flex flex-col items-center space-y-5 sm:flex-row sm:space-y-0 pt-8 pb-6 ">
                <div class="relative">
                    <!-- Gambar profil saat ini -->
                    <img id="current-profile-image"
                        class="object-cover w-40 h-40 p-1 rounded-full ring-2 ring-indigo-300 dark:ring-indigo-500"
                        src="{{ optional($user->profile)->profile_images ? asset('storage/' . $user->profile->profile_images) : asset('img/image.png')  }}"
                        alt="Profile Picture">

                    <!-- Input untuk mengubah gambar -->
                    <input id="change-picture" name="profile_images" type="file" class="hidden" accept="image/*">
                </div>

                <div class="flex flex-col space-y-5 sm:ml-8">
                    <!-- Tombol untuk mengganti gambar -->
                    <label for="change-picture" class="cursor-pointer">
                        <span
                            class="py-3 px-5 text-base font-medium text-slate-100 bg-slate-800 rounded-lg  hover:opacity-95 dark:bg-slate-100/90 dark:text-slate-800  dark:hover:bg-slate-50 dark:duration-50">
                            {{ __('Change Picture') }}
                        </span>
                    </label>
                </div>
            </div>

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                    required>
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                    required>
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="password" name="password"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                    placeholder="Leave blank to keep current password">
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>

            <div class="mb-4">
                <label for="no_hp" class="block text-sm font-medium text-gray-700">Phone</label>
                <input type="text" id="no_hp" name="no_hp" value="{{ old('no_hp', $user->profile->no_hp ?? '') }}"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>

            <div class="mb-4">
                <label for="alamat" class="block text-sm font-medium text-gray-700">Address</label>
                <input type="text" id="alamat" name="alamat"
                    value="{{ old('alamat', $user->profile->alamat ?? '') }}"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>

            <div class="mb-4">
                <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700">Birth Date</label>
                <input type="date" id="tanggal_lahir" name="tanggal_lahir"
                    value="{{ old('tanggal_lahir', $user->profile->tanggal_lahir ?? '') }}"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>

            <div class="mb-8">
                <label for="jenis_kelamin" class="block text-sm font-medium text-gray-700">Gender</label>
                <select id="jenis_kelamin" name="jenis_kelamin"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    <option value="">Select Gender</option>
                    <option value="L"
                        {{ old('jenis_kelamin', $user->profile->jenis_kelamin ?? '') == 'L' ? 'selected' : '' }}>Laki-Laki
                    </option>
                    <option value="P"
                        {{ old('jenis_kelamin', $user->profile->jenis_kelamin ?? '') == 'P' ? 'selected' : '' }}>Perempuan
                    </option>
                </select>
            </div>


            <div class="mb-4">
                <button type="submit"
                    class="w-36 bg-blue-500 text-white py-2 px-4 rounded-md shadow-sm hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Update
                    Profile</button>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Ambil elemen input file untuk mengubah gambar
            const changePictureInput = document.getElementById('change-picture');
            // Ambil elemen gambar profil saat ini
            const currentProfileImage = document.getElementById('current-profile-image');

            // Ketika input file berubah (saat pengguna memilih gambar baru)
            changePictureInput.addEventListener('change', function(event) {
                // Ambil file yang dipilih oleh pengguna
                const file = event.target.files[0];

                // Buat objek URL untuk preview gambar
                const imageUrl = URL.createObjectURL(file);

                // Ganti sumber gambar pada elemen gambar profil
                currentProfileImage.src = imageUrl;
            });

            // Ketika tombol "Delete Picture" diklik
            const deletePictureButton = document.getElementById('delete-picture');
            deletePictureButton.addEventListener('click', function() {
                // Set gambar profil ke default atau kosong (sesuai kebutuhan Anda)
                currentProfileImage.src =
                    'https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/jese-leos.png';

                // Reset nilai input file agar tidak mengirim file gambar saat menyimpan
                changePictureInput.value = null;
            });
        });
    </script>


@endsection
