<?php
namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\ProjectResource\Pages;
use App\Models\Project;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    protected static ?string $navigationGroup = 'Website';

    protected static ?string $navigationLabel = 'Projects';

    protected static ?string $modelLabel = 'Project';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('Project')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('Informasi Dasar')
                            ->schema([
                                Forms\Components\TextInput::make('title')
                                    ->label('Judul Project')
                                    ->required()
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state ?? '')))
                                    ->maxLength(255)
                                    ->columnSpanFull(),
                                Forms\Components\TextInput::make('slug')
                                    ->required()
                                    ->unique(ignoreRecord: true)
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('badge')
                                    ->label('Badge')
                                    ->maxLength(255),
                                Forms\Components\Select::make('status')
                                    ->label('Status Project')
                                    ->options([
                                        'development' => 'Development',
                                        'done' => 'Done',
                                        'planning' => 'Planning',
                                    ])
                                    ->default('development')
                                    ->required(),
                                Forms\Components\TextInput::make('progress')
                                    ->label('Progress (%)')
                                    ->numeric()
                                    ->minValue(0)
                                    ->maxValue(100)
                                    ->default(0)
                                    ->suffix('%'),
                                Forms\Components\TagsInput::make('tech_tags')
                                    ->label('Tech Stack Tags')
                                    ->placeholder('Laravel, Filament, Docker')
                                    ->columnSpanFull(),
                                Forms\Components\Textarea::make('short_description')
                                    ->label('Deskripsi Singkat')
                                    ->rows(3)
                                    ->columnSpanFull(),
                                Forms\Components\Toggle::make('is_published')
                                    ->label('Publish')
                                    ->default(true),
                                Forms\Components\TextInput::make('sort_order')
                                    ->label('Urutan')
                                    ->numeric()
                                    ->default(0),
                            ])->columns(2),
                        Forms\Components\Tabs\Tab::make('Ringkasan Project')
                            ->schema([
                                Forms\Components\Repeater::make('problems')
                                    ->label('Analisis Masalah')
                                    ->simple(
                                        Forms\Components\TextInput::make('item')
                                            ->label('Poin Analisis')
                                            ->required(),
                                    )
                                    ->columnSpanFull(),
                                Forms\Components\TextInput::make('backend_tech')
                                    ->label('Backend'),
                                Forms\Components\TextInput::make('database_tech')
                                    ->label('Database'),
                                Forms\Components\TextInput::make('frontend_tech')
                                    ->label('Frontend'),
                                Forms\Components\TextInput::make('server_tech')
                                    ->label('Server'),
                                Forms\Components\FileUpload::make('diagram_image')
                                    ->label('Flowchart')
                                    ->image()
                                    ->directory('projects/diagrams')
                                    ->disk('public')
                                    ->columnSpanFull(),
                                Forms\Components\FileUpload::make('pdf_file')
                                    ->label('File PDF Laporan')
                                    ->acceptedFileTypes(['application/pdf'])
                                    ->directory('projects/pdf')
                                    ->disk('public')
                                    ->columnSpanFull(),
                            ])->columns(2),
                        Forms\Components\Tabs\Tab::make('Detail Project')
                            ->schema([
                                Forms\Components\TextInput::make('detail_badge')
                                    ->label('Badge Detail'),
                                Forms\Components\TextInput::make('detail_subtitle')
                                    ->label('Subjudul Detail')
                                    ->columnSpanFull(),
                                Forms\Components\Textarea::make('solution_description')
                                    ->label('Deskripsi Singkat')
                                    ->rows(4)
                                    ->columnSpanFull(),
                                Forms\Components\Repeater::make('features')
                                    ->label('Kebutuhan Sistem')
                                    ->schema([
                                        Forms\Components\TextInput::make('title')
                                            ->label('Kebutuhan')
                                            ->required(),
                                        Forms\Components\Textarea::make('description')
                                            ->label('Penjelasan')
                                            ->rows(2)
                                            ->required(),
                                    ])
                                    ->columns(1)
                                    ->columnSpanFull(),
                                Forms\Components\Repeater::make('architecture')
                                    ->label('Arsitektur & Tech Stack')
                                    ->schema([
                                        Forms\Components\TextInput::make('component')
                                            ->label('Komponen')
                                            ->required(),
                                        Forms\Components\TextInput::make('technology')
                                            ->label('Teknologi')
                                            ->required(),
                                        Forms\Components\Textarea::make('description')
                                            ->label('Penjelasan')
                                            ->rows(2)
                                            ->required(),
                                    ])
                                    ->columns(1)
                                    ->columnSpanFull(),
                                Forms\Components\Textarea::make('diagram_note')
                                    ->label('Catatan Flowchart')
                                    ->rows(3)
                                    ->columnSpanFull(),
                            ])->columns(2),
                    ])
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Judul')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'done' => 'success',
                        'planning' => 'info',
                        default => 'warning',
                    }),
                Tables\Columns\TextColumn::make('progress')
                    ->label('Progress')
                    ->suffix('%')
                    ->sortable(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_published')
                    ->label('Publish')
                    ->boolean(),
                Tables\Columns\TextColumn::make('sort_order')
                    ->label('Urutan')
                    ->sortable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Diperbarui')
                    ->dateTime()
                    ->sortable(),
            ])
            ->defaultSort('sort_order')
            ->reorderable('sort_order')
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}
