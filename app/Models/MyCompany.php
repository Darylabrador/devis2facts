<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyCompany extends Model
{
    use HasFactory;
    protected $table = 'mycompany';
    protected $fillable = ['name', 'address', 'postcode', 'siret', 'city'];
    public $timestamps = false;
}
