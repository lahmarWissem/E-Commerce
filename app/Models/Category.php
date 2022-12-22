<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
   
    
        use HasFactory;
        public $timestamps =false;
        protected $table = 'category';
        protected $fillable = [
       'name',
       'slug',
       'description',
      'status',
        'popular',
       'meta_title',
       'meta_descrip',
       'meta_keywords',
       'image_cat'];
     
    
}
