<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientAddresses extends Model
{
    use HasFactory;
    protected $table = 'clientadresses';
    protected $fillable = ['address', 'client_id', 'postcode', 'city'];
    public $timestamps = false;

    public function clients()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }
}
