<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'admins';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'password' => 'hashed',
    ];

    public function scopeStatus($query, $status = 1)
    {
        return $query->where('status', $status);
    }

    public function role()
    {
        return $this->hasOne(Role::class, 'id', 'role_id')->select('id', 'permission', 'name', 'status', 'avatar');
    }

    public function exhibitions()
    {
        return $this->belongsToMany(Exhibition::class, 'user_exhibition')->withPivot('role');
    }

    public function scopeFilter($query, $q = null, $role_id = null)
    {
        if(!empty($q))
            return $query->where('email', 'LIKE', "%$q%")
                        ->orWhere('fullname', 'LIKE', "%$q%")
                        ->orWhere('phone', 'LIKE', "%$q%");
        

        if(!empty($role_id))
            return $query->where('role_id', $role_id);
    }
}
