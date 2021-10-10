<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'description', 'image_path', 'category'];

    // one to many relationship
//    public function category()
//    {
//        return $this->belongsTo(Category::class);
//    }
}
