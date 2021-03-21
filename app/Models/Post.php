<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mtownsend\ReadTime\ReadTime;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Post extends Model
{
    use HasFactory;
    use HasSlug;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'type',
        'redirect_url',
        'intro',
        'content',
        'published_at',
        'slug',
        'is_online',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'published_at' => 'datetime',
        'is_online' => 'boolean',
    ];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    /**
     * Scope a query to only include only online posts and
     * where published date is not more recent than now.
     */
    public function scopeOnline($query): Builder
    {
        return $query
            ->where('is_online', true)
            ->where('published_at', '<=', now());
    }

    /**
     * Scope a query to search in title, intro and content.
     */
    public function scopeSearch(Builder $query, string $search): Builder
    {
        return $query
            ->where('title', 'LIKE', "%{$search}%")
            ->orWhere('intro', 'LIKE', "%{$search}%")
            ->orWhere('content', 'LIKE', "%{$search}%");
    }

    public function getUrlAttribute()
    {
        return route('post.show', $this);
    }

    public function getReadTimeAttribute()
    {
        return (new ReadTime($this->content))
            ->abbreviated()
            ->get();
    }

    /**
     * Retrieve the model for a bound value.
     *
     * @param  mixed  $value
     * @param  string|null  $field
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function resolveRouteBinding($value, $field = null)
    {
        return $this
            ->online()
            ->where($field ?: 'id', $value)
            ->firstOrFail();
    }
}
