<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
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
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
