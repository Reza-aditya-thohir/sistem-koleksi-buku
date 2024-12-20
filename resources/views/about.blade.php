@extends('layouts.main')
@section('container')
<section class="w-full text-center py-20 bg-slate-50">
    <h2 class="text-3xl font-semibold text-center py-4">About Us</h2>
    <p class="mb-6 text-sm font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">
        Selamat datang di Galery Books, sumber utama Anda untuk semua hal tentang buku. Kami berdedikasi untuk memberikan Anda literatur terbaik, dengan fokus pada variasi, kualitas, dan layanan pelanggan.
    </p>
</section>

<section class="w-full py-10 bg-white">
    <div class="container mx-auto">
        <h3 class="text-2xl font-bold mb-6 text-center">Our Mission</h3>
        <p class="text-center mb-6 text-gray-600 lg:text-lg sm:px-16 xl:px-48">
            Misi kami adalah untuk menumbuhkan kecintaan terhadap membaca dengan menyediakan beragam pilihan buku yang cocok untuk pembaca dari segala usia dan minat. Kami percaya bahwa buku memiliki kekuatan untuk menginspirasi, mendidik, dan mengubah hidup.
        </p>
    </div>
</section>

<section class="w-full py-10 bg-slate-50">
    <div class="container mx-auto">
        <h3 class="text-2xl font-bold mb-6 text-center">Tim Kami</h3>
        <div class="flex flex-wrap justify-center space-x-6">
            <!-- Anggota Tim 1 -->
            <div class="w-64 bg-white rounded-lg shadow-md p-6 text-center">
                <img src="img/profile.png" alt="Anggota Tim 1" class="w-32 h-32 mx-auto rounded-full object-cover mb-4">
                <h4 class="text-lg font-semibold">Reza aditya</h4>
                <p class="text-gray-600">Pendiri Website</p>
                <p class="mt-4 text-gray-500 text-sm">Norman memiliki gairah besar terhadap buku dan telah mendedikasikan hidupnya untuk membangun komunitas pembaca yang bersemangat.</p>
            </div>
            
        </div>
    </div>
</section>

<section class="w-full py-10 bg-white">
    <div class="container mx-auto text-center">
        <h3 class="text-2xl font-bold mb-6">Hubungi Kami</h3>
        <p class="mb-6 text-gray-600 lg:text-lg sm:px-16 xl:px-48">
            Punya pertanyaan atau umpan balik? Kami senang mendengar dari Anda! Hubungi kami di <a href="mailto:info@galerybooks.com" class="text-blue-500">normanmuhammad300@gmail.com</a> 
        </p>
        <form action="#"  class="max-w-lg mx-auto">
            <div class="mb-4">
                <input type="text" name="name" placeholder="Nama Anda" class="w-full border-gray-300 p-2 rounded-lg">
            </div>
            <div class="mb-4">
                <input type="email" name="email" placeholder="Email Anda" class="w-full border-gray-300 p-2 rounded-lg">
            </div>
            <div class="mb-4">
                <textarea name="message" placeholder="Pesan Anda" class="w-full border-gray-300 p-2 rounded-lg"></textarea>
            </div>
            <button type="submit" class="bg-blue-700 text-white px-4 py-2 rounded-lg hover:bg-blue-800">Kirim Pesan</button>
        </form>
    </div>
</section>

@endsection
