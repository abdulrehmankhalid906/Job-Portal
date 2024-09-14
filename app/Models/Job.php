<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable =
    [
        'user_id',
        'company_id',
        'title',
        'slug',
        'description',
        'category_id',
        'country_id',
        'city_id',
        'position_level',
        'job_type',
        'salary_range',
        'valid_till',
        'extra_document'

    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function companies()
    {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }

    public function countries()
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }

    public function cities()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }

    public function applies()
    {
        return $this->hasMany(Apply::class);
    }


}
