<?php

namespace App\Repositories;

class CommonRepository
{
    public function __construct()
    {
       
    }
    
    public function positions()
    {
        $positions = ['Junior Level','Middle Level','Senior Level','Expert Level','Specialist Level'];
        return $positions;
    }

    public function types()
    {
        $types = ['Internship','Freelancer','Contract','Permanant','Project Base'];
        return $types;
    }

    public function range()
    {
        $ranges = ['20K-30K','50K-80K','150K-300K','350K+'];
        return $ranges;
    }

    public function status()
    {
        $statuses = ['Pending','Approved','Rejected'];
        return $statuses;
    }
}
