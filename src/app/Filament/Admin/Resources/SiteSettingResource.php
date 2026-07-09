<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\SiteSettingResource\Pages;
use App\Models\SiteSetting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;

class SiteSettingResource extends Resource
{
    protected static ?string $model = SiteSetting::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static ?string $navigationGroup = 'Website';

    protected static ?string $navigationLabel = 'Pengaturan Situs';

    protected static ?string $modelLabel = 'Pengaturan Situs';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('Settings')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('Umum')
                            ->schema([
                                Forms\Components\TextInput::make('site_title')
                                    ->label('Judul Situs')
                                    ->required()
                                    ->maxLength(255)
                                    ->columnSpanFull(),
                                Forms\Components\TextInput::make('navbar_brand')
                                    ->label('Brand Navbar')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('navbar_highlight')
                                    ->label('Highlight Navbar')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('student_name')
                                    ->label('Nama Mahasiswa')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('student_nim')
                                    ->label('NIM')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\Textarea::make('footer_text')
                                    ->label('Teks Footer')
                                    ->rows(2)
                                    ->columnSpanFull(),
                            ])->columns(2),
                        Forms\Components\Tabs\Tab::make('Halaman Home')
                            ->schema([
                                Forms\Components\TextInput::make('home_welcome_badge')
                                    ->label('Badge Selamat Datang')
                                    ->columnSpanFull(),
                                Forms\Components\TextInput::make('home_greeting')
                                    ->label('Sapaan')
                                    ->required(),
                                Forms\Components\TextInput::make('home_name_highlight')
                                    ->label('Nama Highlight')
                                    ->required(),
                                Forms\Components\TextInput::make('home_subtitle')
                                    ->label('Subjudul')
                                    ->columnSpanFull(),
                                Forms\Components\Textarea::make('home_bio')
                                    ->label('Bio / Deskripsi')
                                    ->rows(5)
                                    ->columnSpanFull(),
                                Forms\Components\TextInput::make('home_quote')
                                    ->label('Quote')
                                    ->columnSpanFull(),
                                Forms\Components\FileUpload::make('profile_image')
                                    ->label('Foto Profil')
                                    ->image()
                                    ->directory('profile')
                                    ->disk('public')
                                    ->imageEditor()
                                    ->columnSpanFull(),
                            ])->columns(2),
                        Forms\Components\Tabs\Tab::make('Halaman Contact')
                            ->schema([
                                Forms\Components\TextInput::make('contact_title')
                                    ->label('Judul Contact')
                                    ->required()
                                    ->columnSpanFull(),
                                Forms\Components\TextInput::make('contact_subtitle')
                                    ->label('Subjudul Contact')
                                    ->columnSpanFull(),
                            ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageSiteSetting::route('/'),
        ];
    }
}
