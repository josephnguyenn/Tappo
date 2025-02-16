<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'order';
    protected $primaryKey = 'order_ID';
    public $timestamps = false;

    protected $fillable = [
        'customer_ID',
        'product_ID',
        'quantity',
        'delivery_method',
        'order_date',
        'total_price',
        'paid_amount',
        'order_status',
        'payment_status',
        'delivery_supplier_ID'
    ];

    // Relationship: An order belongs to a customer
    public function customer() {
        return $this->belongsTo(Customer::class, 'customer_ID');
    }

    // Relationship: An order belongs to a product
    public function product() {
        return $this->belongsTo(Product::class, 'product_ID');
    }

    // Relationship: An order is handled by a delivery supplier
    public function deliverySupplier() {
        return $this->belongsTo(DeliverySupplier::class, 'delivery_supplier_ID');
    }

    // Relationship: An order can have multiple invoices
    public function invoices() {
        return $this->hasMany(Invoice::class, 'order_ID');
    }
}
