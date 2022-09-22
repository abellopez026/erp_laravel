<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleDetail extends Model
{
    use HasFactory;

    protected $table = 'saledetail';

    protected $fillable = ['sale_id', 'product_id', 'cantity', 'price', 'total'];

    public function sale() {

        return $this->belongsTo(Sale::class);
        
    }
}