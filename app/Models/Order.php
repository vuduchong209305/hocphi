<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function scopeKeyword($query, $q = null)
    {
        if(!empty($q)) {
            return $query->where('code', 'LIKE', "%$q%")
                        ->orWhere('fullname', 'LIKE', "%$q%")
                        ->orWhere('company', 'LIKE', "%$q%")
                        ->orWhere('email', 'LIKE', "%$q%")
                        ->orWhere('phone', 'LIKE', "%$q%")
                        ->orWhere('cccd', 'LIKE', "%$q%")
                        ->orWhere('birthday', 'LIKE', "%$q%");
        }
    }

    public function scopeCourse($query, $course_id = null)
    {
        if(!empty($course_id))
            return $query->where('course_id', $course_id);
    }

    public function scopePaid($query, $paid_at = null)
    {
        if(isset($paid_at)) {
            return $paid_at == 1 ? $query->where('paid_at', $paid_at) : $query->whereNull('paid_at');
        }
    }
}
