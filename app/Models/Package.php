<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    // protected $casts = [
    //     'features' => 'array',
    // ];

    protected $fillable = ['name','features','price','duration'];

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
