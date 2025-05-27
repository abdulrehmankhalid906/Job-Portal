<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','company_name','founded_date','employees_no','company_type','country_id','city_id','company_img'];


    public function users()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function countries()
    {
        return $this->belongsTo(Country::class,'country_id','id');
    }

    public function cities()
    {
        return $this->belongsTo(City::class,'city_id','id');
    }

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

    public function applies()
    {
        return $this->hasMany(Apply::class);
    }

    public function testimonials()
    {
        return $this->hasMany(Testimonial::class);
    }


}
