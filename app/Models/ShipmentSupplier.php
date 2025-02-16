<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShipmentSupplier extends Model
{
    use HasFactory;

    protected $table = 'shipment_supplier';
    protected $primaryKey = 'shipment_supplier_ID';
    public $timestamps = false;

    protected $fillable = [
        'supplier_name'
    ];

    // Relationship: A shipment supplier provides multiple shipments
    public function shipments() {
        return $this->hasMany(Shipment::class, 'shipment_supplier_ID');
    }

    // Relationship: A shipment supplier provides multiple products
    public function products() {
        return $this->hasMany(Product::class, 'shipment_supplier_ID');
    }
}

