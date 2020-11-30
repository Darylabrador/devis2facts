<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = ['name', 'default_price'];
    public $timestamps = false;

    public function ligneDevis()
    {
        return $this->hasMany(LigneDevis::class, 'product_id');
    }
}
