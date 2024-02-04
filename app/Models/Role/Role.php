<?php

namespace App\Models\Role;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'role'
    ];

    public function users()
    {
        return $this->hasOne(User::class);
    }
}
