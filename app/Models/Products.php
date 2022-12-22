<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $table='products';
    protected $fillable=[
        
      'cate_id',
       'name',
       'slug',
       'small_description',
        'description',
       'selling_price',
       'selling_price',
       'image_prod',
       'quantity',
       'taxprod',
       'status',
       'trending',
       'meta_title',
       'meta_keywords',
       'meta_description',
        
    ];

public function category()
{
    return $this->belongsTo(Category::class, 'cate_id', 'id');
}
    
}
