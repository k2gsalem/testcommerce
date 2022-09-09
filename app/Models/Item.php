<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use Illuminate\Database\Eloquent\Builder;


class Item extends Model implements HasMedia,Searchable
{
    use HasFactory;
    use InteractsWithMedia;
    protected $fillable=[
        'id',
        'category_id',
        'title',
        'item_desc',
        'price',
    ];
    protected $casts = [  
        'id'=>'integer',
        'category_id'=>'integer',
        'title'=>'string',
        'item_desc'=>'string',
        'price'=>'double',
    ];
    public function getSearchResult(): SearchResult
    {
        return new \Spatie\Searchable\SearchResult(
            $this,
            $this->title,
            //    $url
        );
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function scopePriceBetween(Builder $query,$from,$to): Builder
    {       
        return $query->whereBetween('price', [$from,$to]);
    }
    public function defaultPhotoUrl(): string
    {
        $name = trim(collect(explode(' ', $this->category->title . ' ' . $this->title))->map(function ($segment) {
            return mb_substr($segment, 0, 1);
        })->join(' '));

        return 'https://ui-avatars.com/api/?name=' . urlencode($name) . '&background=random&bold=true';
    }
}
