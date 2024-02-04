<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'name',
        'shortcode'
    ];

    public function city()
    {
        return $this->hasMany(City::class);
    }

    public function company()
    {
        return $this->hasOne(Company::class);
    }
}
