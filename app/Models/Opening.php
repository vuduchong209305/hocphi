<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opening extends Model
{
    use HasFactory;

    protected $table = 'opening';

    protected $fillable = ['course_id', 'code', 'start_date'];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
}
