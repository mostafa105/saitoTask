<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'details',
        'price',
    ];


    /**
     * Get the customer associated with the Bill
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */

    /**
     * Get all of the comments for the Bill
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bills()
    {
        return $this->belongsToMany(Bill::class)->withPivot(['quantity', 'subtotal']);;
    }
}
