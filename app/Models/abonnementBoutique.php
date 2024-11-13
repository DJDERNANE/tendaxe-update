<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class abonnementBoutique extends Model
{
    use HasFactory;
    protected $fillable = [
        'store_id',
        'nom_abonnement',
        'points',
        'date_debut',
        'date_fin',
        'users',
        'etat',
    ];

    public function store()
    {
        return $this->belongsTo(Store::class);
    }
}
