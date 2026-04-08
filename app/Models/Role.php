<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
    protected $perPage = 20;
    public static $path_avatar = '/admin/avatar/role';
    protected $fillable = ['id', 'name', 'status'];
    
    public function scopeStatus($query, $status = 1)
    {
    	return $query->where('status', $status);
    }

    public function admin()
    {
    	return $this->hasMany(Admin::class, 'role_id', 'id');
    }

    public function scopeFilter($query, $q = null)
    {
        if(!empty($q))
            return $query->where('name', 'LIKE', "%$q%")
                        ->orWhere('permission', 'LIKE', "%$q%")
                        ->orWhere('description', 'LIKE', "%$q%");
        
    }
}
