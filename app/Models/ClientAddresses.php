<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientAddresses extends Model
{
    use HasFactory;
    protected $table = 'clientaddresses';
    protected $fillable = ['address', 'postcode', 'city', 'client_id'];
    public $timestamps = false;

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }
}
