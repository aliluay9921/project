<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Countary extends Model
{
    use HasFactory;

    protected $fillable = [

        'name', 'code', 'user_id'
    ];

    protected $hidden = [

        'created_at',
        'updated_at',
    ];

    public function users()
    {
        return $this->hasmany('App\Models\User', 'countary_id');
    }
    public function setcodeAttribute($value)
    {
        $this->attributes['code'] = strtr($value, array('٠' => '0', '١' => '1', '٢' => '2', '٣' => '3', '٤' => '4', '٥' => '5', '٦' => '6', '٧' => '7', '٨' => '8', '٩' => '9'));
    }
}