<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LigneDevis extends Model
{
    use HasFactory;
    protected $table = 'lignedevis';
    protected $fillable = ['devis_id', 'product_id', 'facturation_id', 'description', 'quantity', 'price'];
    public $timestamps = false;

    use SoftDeletes;

    public function devis()
    {
        return $this->belongsTo(Devis::class, 'devis_id');
    }

    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
    
    public function factures()
    {
        return $this->belongsTo(Facturation::class, 'facturation_id');
    }
}
