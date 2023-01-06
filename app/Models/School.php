<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;

    public function scholarshipApplication()
    {
        return $this->hasMany(ScholarshipApplication::class);
    }
}
