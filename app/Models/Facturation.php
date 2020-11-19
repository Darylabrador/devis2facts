<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facturation extends Model
{
    use HasFactory;
    protected $table = 'facturations';
    protected $fillable = ['is_paid', 'filename'];
    public $timestamps = false;
}