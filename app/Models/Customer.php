<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customer'; // Define table name
    protected $primaryKey = 'customer_ID'; // Define primary key
    public $timestamps = false; // Disable timestamps

    protected $fillable = [
        'customer_name',
        'customer_email',
        'customer_phone',
        'customer_address',
        'bank_account',
        'total_order',
        'total_debt',
        'identity_code',
        'VAT'
    ];

    // Relationship: A customer can have multiple orders
    public function orders() {
        return $this->hasMany(Order::class, 'customer_ID');
    }
}
