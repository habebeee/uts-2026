<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class SiteSetting extends Model
{
    protected $fillable = [
        'site_title',
        'navbar_brand',
        'navbar_highlight',
        'student_name',
        'student_nim',
        'footer_text',
        'home_welcome_badge',
        'home_greeting',
        'home_name_highlight',
        'home_subtitle',
        'home_bio',
        'home_quote',
        'profile_image',
        'contact_title',
        'contact_subtitle',
    ];

    public static function current(): self
    {
        return static::query()->firstOrCreate([], [
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
            'home_bio' => 'Saya adalah seorang mahasiswa IT dan pengembang web (Full-Stack) yang fokus pada penciptaan solusi digital modern, responsif, dan fungsional.',
            'home_quote' => 'Terus belajar, terus berkembang, dan bangun sesuatu yang berarti.',
            'profile_image' => 'images/habib.jpg',
            'contact_title' => 'Contact Me',
            'contact_subtitle' => 'Feel free to contact me',
        ]);
    }

    public function profileImageUrl(): string
    {
        if (blank($this->profile_image)) {
            return asset('images/habib.jpg');
        }

        if (str_starts_with($this->profile_image, 'http') || str_starts_with($this->profile_image, '/')) {
            return $this->profile_image;
        }

        if (str_starts_with($this->profile_image, 'profile/') || str_starts_with($this->profile_image, 'projects/')) {
            return Storage::disk('public')->url($this->profile_image);
        }

        return asset($this->profile_image);
    }
}
