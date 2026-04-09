<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $table = 'course';

    public function scopeStatus($query, $status = 1)
    {
        return $query->where('status', $status);
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'course_id');
    }

    public function openings()
    {
        return $this->hasMany(Opening::class, 'course_id');
    }
}
