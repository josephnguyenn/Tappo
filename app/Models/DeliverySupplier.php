<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliverySupplier extends Model
{
    use HasFactory;

    protected $table = 'delivery_supplier';
    protected $primaryKey = 'delivery_supplier_ID';
    public $timestamps = false;

    protected $fillable = [
        'delivery_supplier_name'
    ];

    // Relationship: A delivery supplier can handle multiple orders
    public function orders() {
        return $this->hasMany(Order::class, 'delivery_supplier_ID');
    }
}
