<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;
    protected $fillable = [
        'sold_at',
        'customer_id',
        'tax',
        'discounnt',
        'notes',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'sold_at' => 'date',
    ];

    /**
     * Get the customer associated with the Bill
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function customer()
    {
        return $this->hasOne(Customer::class);
    }

    /**
     * Get all of the comments for the Bill
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products($data)
    {
        return $this->belongsToMany(Product::class)->withPivotValue( $data);
    }
}
