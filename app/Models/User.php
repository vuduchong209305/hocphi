<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';

    protected $fillable = ['email', 'phone', 'fullname', 'company', 'code', 'password', 'avatar', 'exhibition_id', 'otp', 'status', 'verified_at', 'updated_otp', 'provider', 'provider_id', 'password_reset_token', 'password_reset_token_at'];

    protected $hidden = ['password'];

    protected $casts = [
        'password' => 'hashed',
    ];

    protected function serializeDate(\DateTimeInterface $date)
    {
        return \Carbon\Carbon::instance($date)->timezone(config('app.timezone'))->format('Y-m-d H:i:s');
    }

    public function scopeFilter($query, $q = null)
    {
        if(!empty($q)) {
            return $query->where('email', 'LIKE', "%$q%")
                        ->orWhere('fullname', 'LIKE', "%$q%")
                        ->orWhere('company', 'LIKE', "%$q%")
                        ->orWhere('address', 'LIKE', "%$q%")
                        ->orWhere('code', 'LIKE', "%$q%")
                        ->orWhere('phone', 'LIKE', "%$q%")
                        ->orWhere('description', 'LIKE', "%$q%")
                        ->orWhere('purpose', 'LIKE', "%$q%")
                        ->orWhere('website', 'LIKE', "%$q%")
                        ->orWhere('created_at', 'LIKE', "%$q%");
        }
    }

    public function scopeStatus($query, $status = 1)
    {
        return $query->where('status', $status);
    }

    public function scopeVerify($query, $is_verify = 1)
    {
        return $query->where('is_verify', $is_verify);
    }

    public function scopeAgency($query, $agency_id = 1)
    {
        return $query->where('agency_id', $agency_id);
    }

    public function userType()
    {
        return $this->belongsTo(UserType::class, 'type', 'id');
    }

    public function position()
    {
        return $this->belongsTo(Position::class, 'position_id', 'id');
    }

    public function userExhibition()
    {
        return $this->hasMany(UserExhibition::class, 'user_id');
    }

    public function scopeType($query, $type = null)
    {
        if(!empty($type)) return $query->where('type', $type);
    }

    public function scopeExhibition($query, $exhibitions = [])
    {
        if(!empty($exhibitions)) 
            return $query->whereHas('exhibitionExhibitors', function ($q) use ($exhibitions) {
                $q->whereIn('exhibition_id', $exhibitions);
            });
    }

    public function referenceGroup()
    {
        return $this->belongsTo(User::class, 'reference', 'id');
    }

    public function booths()
    {
        return $this->hasMany(Booth::class, 'company_id');
    }

    public function exhibitionExhibitors()
    {
        return $this->belongsToMany(Exhibition::class, 'exhibition_exhibitor', 'exhibitor_id', 'exhibition_id');
    }

    public function categoryProducts()
    {
        return $this->belongsToMany(CategoryProduct::class, 'user_category_product', 'user_id', 'category_product_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }

    public function scopeCountry($query, $countries)
    {
        if (empty($countries)) {
            return $query;
        }

        return $query->whereIn('country_id', $countries);
    }

    public function scopeCategory($query, $categories)
    {
        if (empty($categories)) {
            return $query;
        }

        return $query->whereHas('categoryProducts', function ($q) use ($categories) {
            $q->whereIn('category_product_id', $categories);
        });
    }

    public function meetingSender()
    {
        return $this->hasMany(Meeting::class, 'sender_id');
    }

    public function meetingReceiver()
    {
        return $this->hasMany(Meeting::class, 'receiver_id');
    }
}
