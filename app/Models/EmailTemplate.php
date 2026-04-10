<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailTemplate extends Model
{
    use HasFactory;

    protected $table = 'mail';
    
    public function scopeStatus($query, $status = 1)
    {
        return $query->where('status', $status);
    }

    public function details()
    {
        return $this->hasMany(EmailTemplateDetail::class, 'mail_id');
    }

    public function detail()
    {
        return $this->hasOne(EmailTemplateDetail::class, 'mail_id')
                    ->select('mail_id', 'subject', 'body')
                    ->where('lang_id', getLangId());
    }
}