<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'product';
    protected $primaryKey = 'product_ID';
    public $timestamps = false;

    protected $fillable = [
        'shipment_supplier_ID',
        'product_name',
        'quantity',
        'expired_date',
        'tax_rate',
        'purchase_cost',
        'price',
        'category',
        'product_code'
    ];

    // Relationship: A product belongs to a shipment supplier
    public function shipmentSupplier() {
        return $this->belongsTo(ShipmentSupplier::class, 'shipment_supplier_ID');
    }

    // Relationship: A product can be in multiple orders
    public function orders() {
        return $this->hasMany(Order::class, 'product_ID');
    }
}


