<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        // 'category_short_code',
        'category_desc',

    ];
    protected $casts = [     
        'id' => 'integer',
        'title'=>'string',
        // 'category_short_code'=>'string',
        'category_desc'=>'string',
    ];
    public function items()
    {
        return $this->hasMany(Item::class,'category_id');
    }
}
