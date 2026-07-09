<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\SiteSetting;
use App\Models\Skill;
use Illuminate\Database\Seeder;

class PortfolioSeeder extends Seeder
{
    public function run(): void
    {
        SiteSetting::current()->update([
            'site_title' => 'Portfolio - Habiburrahman Ikwan Mujahidin',
            'navbar_brand' => 'Habib.',
            'navbar_highlight' => 'Portofolio',
            'student_name' => 'Habiburrahman Ikwan Mujahidin',
            'student_nim' => '2024080149',
            'footer_text' => '© 2026 Habiburrahman Ikwan Mujahidin | Tugas UTS Pemrograman Web',
            'home_welcome_badge' => '✨ Selamat Datang di Portofolio Saya',
            'home_greeting' => 'Halo, Saya',
            'home_name_highlight' => 'Habib',
            'home_subtitle' => '💻 Full-Stack Web Developer & Mahasiswa IT',
            'home_bio' => 'Saya adalah seorang mahasiswa IT dan pengembang web (Full-Stack) yang fokus pada penciptaan solusi digital modern, responsif, dan fungsional. Saat ini, saya aktif mendalami ekosistem PHP (Laravel) untuk arsitektur backend yang kokoh berbasis MVC, serta Bootstrap & JavaScript untuk antarmuka frontend yang interaktif. Saya berkomitmen menulis kode yang bersih (clean code) untuk mentransformasikan ide kompleks menjadi aplikasi nyata yang solutif.',
            'home_quote' => 'Terus belajar, terus berkembang, dan bangun sesuatu yang berarti.',
            'profile_image' => 'images/habib.jpg',
            'contact_title' => 'Contact Me',
            'contact_subtitle' => 'Feel free to contact me',
        ]);

        $skills = [
            ['name' => 'Laravel', 'css_class' => 'laravel', 'sort_order' => 1],
            ['name' => 'Bootstrap', 'css_class' => 'bootstrap', 'sort_order' => 2],
            ['name' => 'JavaScript', 'css_class' => 'javascript', 'sort_order' => 3],
            ['name' => 'MySQL', 'css_class' => 'mysql', 'sort_order' => 4],
            ['name' => 'Git & GitHub', 'css_class' => 'git', 'sort_order' => 5],
        ];

        foreach ($skills as $skill) {
            Skill::updateOrCreate(
                ['name' => $skill['name']],
                $skill + ['is_active' => true]
            );
        }

        Project::updateOrCreate(
            ['slug' => 'sistem-voting-skin-yss'],
            [
                'title' => 'Sistem Voting Skin Terfavorit Hero Yi Sun-shin (YSS)',
                'badge' => 'UTS - Pemrograman Web',
                'status' => 'development',
                'progress' => 85,
                'tech_tags' => ['Laravel', 'Bootstrap', 'MariaDB', 'Docker'],
                'short_description' => 'Website voting online berbasis Laravel yang digunakan untuk membantu komunitas pemain Mobile Legends melakukan voting skin favorit hero Yi Sun-shin secara real-time dan terstruktur.',
                'background' => 'Dalam komunitas Mobile Legends, voting skin favorit biasanya hanya dilakukan melalui media sosial atau polling sederhana sehingga hasil voting sulit dikelola dan kurang terstruktur.',
                'problems' => [
                    'Membuat sistem voting skin berbasis website.',
                    'Mengurangi spam/manipulasi voting.',
                    'Mengelola data voting secara sentral.',
                    'Menampilkan hasil voting real-time.',
                ],
                'backend_tech' => 'Laravel & PHP',
                'database_tech' => 'MariaDB (MySQL)',
                'frontend_tech' => 'Bootstrap 5',
                'server_tech' => 'Docker (Containerization)',
                'diagram_image' => 'images/flowchart.png',
                'pdf_file' => 'pdf/laporanyss.pdf',
                'detail_badge' => 'UTS - Pemrograman Web',
                'detail_subtitle' => 'Dokumentasi Resmi & Rencana Perancangan Sistem',
                'solution_description' => 'Aplikasi ini menawarkan platform berbasis web yang transparan dan interaktif bagi komunitas pemain Mobile Legends untuk melakukan pemungutan suara (voting) skin terbaik dari hero Yi Sun-shin. Dengan sistem ini, pengumpulan data preferensi skin menjadi lebih terstruktur, real-time, dan mencegah adanya manipulasi voting ganda melalui sistem autentikasi yang valid.',
                'background_detail' => 'Penentuan skin terfavorit di komunitas seringkali dilakukan secara manual melalui polling media sosial yang tidak akurat, mudah dimanipulasi, dan datanya tidak tersimpan dengan baik. Oleh karena itu, diperlukan sistem khusus yang dapat mendata setiap suara secara adil dan menyajikannya dalam bentuk grafik/informasi yang menarik.',
                'features' => [
                    ['title' => 'Autentikasi User', 'description' => 'Registrasi dan login bagi para pemilih (voter) untuk memastikan 1 user hanya bisa memilih 1 kali.'],
                    ['title' => 'Dashboard Katalog Skin', 'description' => 'Menampilkan daftar skin hero YSS lengkap dengan gambar dan deskripsinya.'],
                    ['title' => 'Fitur Voting Klik', 'description' => 'Tombol interaktif untuk memberikan suara pada skin pilihan.'],
                    ['title' => 'Real-Time Hasil / Polling', 'description' => 'Menampilkan total perolehan suara dalam bentuk angka atau grafik interaktif setelah melakukan voting.'],
                ],
                'architecture' => [
                    ['component' => 'Backend Framework', 'technology' => 'Laravel 10/11 (PHP)', 'description' => 'Mengatur arsitektur MVC, routing web, pengamanan data, dan logika voting sistem.'],
                    ['component' => 'Frontend Styling', 'technology' => 'Bootstrap 5 & CSS', 'description' => 'Membuat tampilan antarmuka (UI) web portofolio menjadi responsif, rapi, dan nyaman dilihat di HP maupun Laptop.'],
                    ['component' => 'Database Storage', 'technology' => 'MySQL', 'description' => 'Menyimpan data pengguna (users), data informasi skin YSS, dan riwayat transaksi hasil voting.'],
                    ['component' => 'Environment / Server', 'technology' => 'Docker & Nginx', 'description' => 'Sebagai containerisasi lokal agar server PHP dan database berjalan stabil dan serupa dengan kondisi server produksi.'],
                ],
                'diagram_note' => 'Diagram di atas menggambarkan bagaimana entitas User melakukan relasi One-to-Many terhadap entitas Vote, yang mana setiap data pilihan akan terikat langsung dengan ID Skin YSS yang terdaftar di database MySQL.',
                'is_published' => true,
                'sort_order' => 1,
            ]
        );

        Project::updateOrCreate(
            ['slug' => 'sistem-catatan-pasien-rumah-sakit'],
            [
                'title' => 'Sistem Catatan Pasien Rumah Sakit Berbasis Website',
                'badge' => 'Project Kuliah',
                'status' => 'development',
                'progress' => 85,
                'tech_tags' => ['Laravel', 'Livewire', 'Blade', 'Filament V3', 'MariaDB'],
                'short_description' => 'Aplikasi web untuk pencatatan data pasien rumah sakit dengan fitur CRUD, pencarian, dan laporan yang dapat dikelola melalui admin panel.',
                'is_published' => true,
                'sort_order' => 2,
            ]
        );

        Project::updateOrCreate(
            ['slug' => 'portfolio-dinamis-filament'],
            [
                'title' => 'Portfolio Dinamis dengan Admin Panel Filament',
                'badge' => 'Portfolio',
                'status' => 'done',
                'progress' => 100,
                'tech_tags' => ['Laravel', 'Filament V3', 'Bootstrap', 'Docker'],
                'short_description' => 'Website portfolio personal dengan CMS dinamis. Semua konten halaman dapat diubah melalui panel admin Filament tanpa menyentuh kode.',
                'is_published' => true,
                'sort_order' => 3,
            ]
        );

        Project::updateOrCreate(
            ['slug' => 'sistem-absensi-karyawan'],
            [
                'title' => 'Sistem Absensi Karyawan Berbasis QR Code',
                'badge' => 'Rencana',
                'status' => 'planning',
                'progress' => 40,
                'tech_tags' => ['Laravel', 'MySQL', 'JavaScript'],
                'short_description' => 'Perancangan sistem absensi digital menggunakan QR Code untuk mempermudah pencatatan kehadiran karyawan secara real-time.',
                'is_published' => true,
                'sort_order' => 4,
            ]
        );
    }
}
