<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function detections(){
        return $this->hasMany('App\Detections');
    }

    public function familyb(){
        return $this->hasOne('App\FamilyBackground');
    }

    public function patological(){
        return $this->hasOne('App\PathologicalPErsonalBackground');
    }

    public function toxic(){
        return $this->hasOne('App\ToxicActive');
    }

    public function biological(){
        return $this->hasOne('App\AppliedBiological');
    }

    public function gyb(){
        return $this->hasOne('App\ObgynHistory');
    }

    public function oral(){
        return $this->hasOne('App\OralHealt');
    }
}
