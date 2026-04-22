<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    public function type_product()
    {
        return $this->belongsTo(TypeProduct::class, 'id_type', 'id');
    }

    public function bill_detail()
    {
        return $this->hasMany(BillDetail::class, 'id_product', 'id');
    }
}
