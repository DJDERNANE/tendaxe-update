<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupParticipant extends Model
{
    use HasFactory;
    protected $fillable = ['offre_id', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class,);
    }

    public function offre()
    {
        return $this->belongsTo(Offre::class);
    }
}
