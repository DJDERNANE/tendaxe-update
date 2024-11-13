<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacteurProforma extends Model
{
    use HasFactory;
    protected $fillable = ['raison', 'fName', 'lName', 'email', 'phone', 'contry', 'region', 'desc'];

    public function files()
    {
        return $this->hasMany(FacteurProformaFiles::class);
    }
}
