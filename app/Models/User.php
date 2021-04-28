<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'countary_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'created_at',
        'updated_at',
        'email_verified_at',
        'countary_id'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    protected $appends = ['full_name']; // هنا يجمع اكثر من اسم ب اسم واحد والفاكشن مالتة جوة 
    protected $with = ['countaries']; //هنا راح بكل ركوست مال يوزر يرجع الكونتريز ويا 

    public function countaries()
    {
        return $this->belongsTo('App\Models\Countary', 'countary_id');
    }
    public function profail_user()
    {
        return $this->hasOne('App\models\profail_user', 'user_id');
    }
    function getFullNameAttribute()
    {

        return sprintf('%s %s', $this->name, $this->email);
    }
}