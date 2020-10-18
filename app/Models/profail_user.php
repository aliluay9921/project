<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profail_user extends Model
{
    use HasFactory;

    protected $fillable=[
        'province','user_id','bio','gender','url'
    ];

    public function user()
    {
        return $this->belongsTo('App\models\User', 'user_id');
    }
}
