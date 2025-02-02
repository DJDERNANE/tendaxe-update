<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class clientStore extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_id', 'store_id'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    
    public function store()
    {
        return $this->belongsTo(Store::class);
    }
}
