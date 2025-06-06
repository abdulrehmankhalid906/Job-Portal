<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Testimonial extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable= ['user_id','company_id','feedback','rating'];

    public function users()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class,'company_id','id');
    }
}
