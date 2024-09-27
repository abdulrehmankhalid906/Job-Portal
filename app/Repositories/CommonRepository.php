<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class CommonRepository
{
    public function __construct()
    {
       
    }
    
    public function positions()
    {
        return ['Junior Level','Middle Level','Senior Level','Expert Level','Specialist Level'];
    }

    public function types()
    {
        return ['Internship','Freelancer','Contract','Permanant','Project Base'];
    }

    public function range()
    {
        return ['20K-30K','50K-80K','150K-300K','350K+'];
    }

    public function status()
    {
        return ['Pending','Approved','Rejected'];
    }

    public function feedbackRating()
    {
        $data = DB::table('testimonials')
            ->select(
                DB::raw('SUM(CASE WHEN rating = 5 THEN 1 ELSE 0 END) as rat_5'),
                DB::raw('SUM(CASE WHEN rating = 4 THEN 1 ELSE 0 END) as rat_4'),
                DB::raw('SUM(CASE WHEN rating = 3 THEN 1 ELSE 0 END) as rat_3'),
                DB::raw('SUM(CASE WHEN rating = 2 THEN 1 ELSE 0 END) as rat_2'),
                DB::raw('SUM(CASE WHEN rating = 1 THEN 1 ELSE 0 END) as rat_1'),
                DB::raw('COUNT(*) as total_count'),
                DB::raw('SUM(rating) as total_rating')
            )->first();

        $total_array = [
            'total_rating' => number_format($data->total_rating / $data->total_count, 1),
            'total_count' => $data->total_count,
            'ratings' => [
                '5' => $data->rat_5,
                '4' => $data->rat_4,
                '3' => $data->rat_3,
                '2' => $data->rat_2,
                '1' => $data->rat_1
            ],
            'colors' => [
                '5' => 'bg-success',
                '4' => 'bg-primary',
                '3' => 'bg-info',
                '2' => 'bg-warning',
                '1' => 'bg-danger'
            ]
        ];

        return $total_array;
    }
}
