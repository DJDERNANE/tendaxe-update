<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacteurProformaFiles extends Model
{
    use HasFactory;
    protected $fillable = ['path', 'facteur_proforma_id'];

    public function facture()
    {
        return $this->belongsto(FacteurProforma::class);
    }
}
