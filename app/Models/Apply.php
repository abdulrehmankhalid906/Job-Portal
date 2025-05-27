<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Apply extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['job_id','company_id','name','email','coverletter','portweb','status','upload_cv'];

    public function jobs()
    {
        return $this->belongsTo(Job::class,'job_id','id');
    }

    public function companies()
    {
        return $this->belongsTo(Company::class,'company_id','id');
    }
}
