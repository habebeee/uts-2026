<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Project extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'badge',
        'status',
        'progress',
        'tech_tags',
        'short_description',
        'background',
        'problems',
        'backend_tech',
        'database_tech',
        'frontend_tech',
        'server_tech',
        'diagram_image',
        'pdf_file',
        'detail_badge',
        'detail_subtitle',
        'solution_description',
        'background_detail',
        'features',
        'architecture',
        'diagram_note',
        'is_published',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'problems' => 'array',
            'features' => 'array',
            'architecture' => 'array',
            'tech_tags' => 'array',
            'is_published' => 'boolean',
            'progress' => 'integer',
        ];
    }

    protected static function booted(): void
    {
        static::saving(function (Project $project) {
            if (blank($project->slug) && filled($project->title)) {
                $project->slug = Str::slug($project->title);
            }
        });
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('title');
    }

    public function mediaUrl(?string $path): ?string
    {
        if (blank($path)) {
            return null;
        }

        if (str_starts_with($path, 'http') || str_starts_with($path, '/')) {
            return $path;
        }

        if (str_starts_with($path, 'profile/') || str_starts_with($path, 'projects/')) {
            return Storage::disk('public')->url($path);
        }

        return asset($path);
    }

    public function diagramImageUrl(): ?string
    {
        return $this->mediaUrl($this->diagram_image);
    }

    public function pdfFileUrl(): ?string
    {
        return $this->mediaUrl($this->pdf_file);
    }

    public function initial(): string
    {
        return strtoupper(substr($this->title, 0, 1));
    }

    public function statusLabel(): string
    {
        return match ($this->status) {
            'done' => 'DONE',
            'planning' => 'PLANNING',
            default => 'DEVELOPMENT',
        };
    }

    public function statusText(): string
    {
        return match ($this->status) {
            'done' => 'Done',
            'planning' => 'Planning',
            default => 'Development',
        };
    }

    public function problemsList(): array
    {
        if (empty($this->problems)) {
            return [];
        }

        return collect($this->problems)
            ->map(function ($item) {
                if (is_string($item)) {
                    return $item;
                }

                return $item['item'] ?? $item['title'] ?? '';
            })
            ->filter()
            ->values()
            ->all();
    }

    public function techTagsList(): array
    {
        if (! empty($this->tech_tags)) {
            return $this->tech_tags;
        }

        return array_values(array_filter([
            $this->backend_tech,
            $this->frontend_tech,
            $this->database_tech,
            $this->server_tech,
        ]));
    }
}
