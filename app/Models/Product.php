<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'product';

    protected $fillable = ['name', 'description', 'price', 'height', 'width', 'weight', 'category_id'];

    public function category() {
        return $this->belongsTo(Category::class);
    }
}
