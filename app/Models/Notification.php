<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','title','type','level','is_read','action_by'];


    public function user()
    {
        return $this->belongs(User::class);
    }
}
