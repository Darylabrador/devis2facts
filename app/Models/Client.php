<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $table = 'clients';
    protected $fillable = ['name', 'clientaddress_id', 'postcode', 'city', 'email'];
    public $timestamps = false;

    public function clientAddresses()
    {
        return $this->belongsTo(ClientAddresses::class, 'clientaddress_id');
    }
}
