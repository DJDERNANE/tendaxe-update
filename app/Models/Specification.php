<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specification extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'image',
        'type',
        'domain_id',
        'status'
    ];


    public function domain()
    {
        return $this->belongsto(Domain::class);
    }
}
