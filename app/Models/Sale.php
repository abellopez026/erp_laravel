<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $table = 'sale';

    protected $fillable = ['invoice_no', 'customer_id', 'status', 'total', 'date'];

    public function customer() {

        return $this->belongsTo(Customer::class);

    }

    public function saledetail() {
        
        return $this->hasMany(SaleDetail::class);
    }

}
