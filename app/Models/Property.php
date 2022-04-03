<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'address',
        'area',
        'price',
        'for_sale',
        'beds',
        'rooms',
        'baths',
        'description',
        'city_id',
        'agent_id',
    ];

    public function photos()
    {
        $this->hasMany(Photo::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function agent()
    {
        return $this->belongsTo(User::class);
    }

    public function usersFavorites()
    {
        return $this->belongsToMany(User::class, 'favorites');
    }
}
