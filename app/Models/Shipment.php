<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    use HasFactory;

    protected $table = 'shipment';
    protected $primaryKey = 'shipment_ID';
    public $timestamps = false;

    protected $fillable = [
        'shipment_supplier_ID',
        'order_date',
        'received_date',
        'expired_date',
        'cost'
    ];

    // Relationship: A shipment belongs to a supplier
    public function shipmentSupplier() {
        return $this->belongsTo(ShipmentSupplier::class, 'shipment_supplier_ID');
    }
}
