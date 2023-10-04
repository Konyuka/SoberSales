<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drink extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'is_alcoholic',
        'volume',
        'volume_unit',
        'buying_price',
        'selling_price'
    ];

    public function inventory()
    {
        return $this->hasMany(Inventory::class);
    }
}
