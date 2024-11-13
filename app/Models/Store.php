<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Store extends Model
{
    use HasFactory;

    protected $fillable =['storeName','logo', 'user_id','cover', 'isActive', 'valeur', 'wilaya', 'region' , 'secteur'];





    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function user()
    {
        return $this->belongsto(User::class);
    }
    
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function abonnement()
    {
        return $this->hasMany(abonnementBoutique::class);
    }

    public function latestSubscription()
    {
        return $this->hasMany(abonnementBoutique::class)->orderByDesc('created_at')->take(1);;
    }

    public function clients(): BelongsToMany
    {
        return $this->belongsToMany(Client::class);
    }
}
