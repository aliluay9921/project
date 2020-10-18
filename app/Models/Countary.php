<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Countary extends Model
{
    use HasFactory;

    protected $fillable=[

        'name','code'
    ];

    protected $hidden = [
      
        'created_at',
        'updated_at',
    ];

    public function users()
    {
        return $this->hasmany('App\Models\User','countary_id');
    }
}
