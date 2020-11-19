<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Devis extends Model
{
    use HasFactory;
    protected $table = 'devis';
    protected $fillable = ['client_id', 'filename', 'tva', 'is_accepted'];
    public $timestamps = false;

    public function clients()
    {
        return $this->belongsTo(User::class, 'client_id');
    }
}
