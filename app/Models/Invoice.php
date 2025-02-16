<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $table = 'invoice';
    protected $primaryKey = 'invoice_ID';
    public $timestamps = false;

    protected $fillable = [
        'order_ID',
        'product_ID',
        'quantity',
        'total_price',
        'customer_ID',
        'customer_name',
        'invoice_date',
        'invoice_payment_date',
        'payment_method'
    ];

    // Relationship: An invoice belongs to an order
    public function order() {
        return $this->belongsTo(Order::class, 'order_ID');
    }

    // Relationship: An invoice belongs to a customer
    public function customer() {
        return $this->belongsTo(Customer::class, 'customer_ID');
    }
}
